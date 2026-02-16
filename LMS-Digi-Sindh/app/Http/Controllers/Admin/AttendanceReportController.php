<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InstructorAttendance;
use App\Models\StudentAttendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AttendanceReportController extends Controller
{
    /**
     * Today's attendance overview for dashboard widget.
     * Returns: studentPresentPercent, studentPresentCount, studentExpectedCount, instructorPresentCount, instructorAbsentCount.
     */
    public static function todayOverview(): array
    {
        $today = now()->toDateString();

        $studentPresent = (int) DB::table('student_attendance')
            ->whereDate('date', $today)
            ->where('status', 'Present')
            ->count(DB::raw('DISTINCT CONCAT(student_id, "-", batch_id)'));

        $studentExpected = (int) DB::table('enrollments')
            ->join('batches', 'enrollments.batch_id', '=', 'batches.id')
            ->where('batches.is_active', true)
            ->whereNotNull('enrollments.batch_id')
            ->count(DB::raw('DISTINCT CONCAT(enrollments.user_id, "-", enrollments.batch_id)'));

        $studentPercent = $studentExpected > 0
            ? round(($studentPresent / $studentExpected) * 100, 1)
            : 0;

        $instructorIds = DB::table('batches')->where('is_active', true)->whereNotNull('instructor_id')->distinct()->pluck('instructor_id');
        $instructorPresent = InstructorAttendance::whereDate('date', $today)->whereNotNull('check_in_time')->whereIn('instructor_id', $instructorIds)->count();
        $instructorAbsent = $instructorIds->count() - $instructorPresent;
        if ($instructorAbsent < 0) {
            $instructorAbsent = 0;
        }

        return [
            'student_present_count' => $studentPresent,
            'student_expected_count' => $studentExpected,
            'student_present_percent' => $studentPercent,
            'instructor_present_count' => $instructorPresent,
            'instructor_absent_count' => $instructorAbsent,
        ];
    }

    /**
     * Correction: list instructor attendance (date range) and edit form.
     */
    public function index(Request $request)
    {
        $date = $request->get('date', now()->toDateString());
        $records = InstructorAttendance::whereDate('date', $date)
            ->with('instructor.userDetail')
            ->orderBy('check_in_time')
            ->get();

        return view('admin.attendance.index', compact('date', 'records'));
    }

    /**
     * Show edit form for one instructor_attendance record.
     */
    public function edit(InstructorAttendance $attendance)
    {
        $attendance->load('instructor.userDetail');
        return view('admin.attendance.edit', compact('attendance'));
    }

    /**
     * Update check_in_time / check_out_time (correction).
     */
    public function update(Request $request, InstructorAttendance $attendance)
    {
        $validated = $request->validate([
            'check_in_time' => ['nullable', 'date'],
            'check_out_time' => ['nullable', 'date', 'after_or_equal:check_in_time'],
        ]);

        if (array_key_exists('check_in_time', $validated)) {
            $attendance->check_in_time = $validated['check_in_time'] ? Carbon::parse($validated['check_in_time']) : null;
        }
        if (array_key_exists('check_out_time', $validated)) {
            $attendance->check_out_time = $validated['check_out_time'] ? Carbon::parse($validated['check_out_time']) : null;
        }
        $attendance->save();

        return redirect()->route('admin.attendance.index', ['date' => $attendance->date->format('Y-m-d')])
            ->with('success', 'Attendance record updated.');
    }

    /**
     * Payroll report: CSV with Instructor Name | Days Present | Total Hours for the month.
     */
    public function payrollCsv(Request $request): StreamedResponse
    {
        $month = $request->get('month', now()->format('Y-m'));
        $start = Carbon::parse($month . '-01')->startOfDay();
        $end = $start->copy()->endOfMonth();

        $records = InstructorAttendance::whereBetween('date', [$start, $end])
            ->whereNotNull('check_in_time')
            ->with('instructor.userDetail')
            ->get();

        $byInstructor = $records->groupBy('instructor_id');
        $rows = [];
        foreach ($byInstructor as $instructorId => $attendances) {
            $instructor = $attendances->first()->instructor;
            $daysPresent = $attendances->count();
            $totalMinutes = $attendances->sum(function ($a) {
                return $a->check_out_time ? (int) $a->check_in_time->diffInMinutes($a->check_out_time) : 0;
            });
            $totalHours = round($totalMinutes / 60, 2);
            $rows[] = [
                $instructor->name ?? $instructor->email,
                $daysPresent,
                $totalHours,
            ];
        }

        $filename = 'payroll-attendance-' . $month . '.csv';
        return response()->streamDownload(function () use ($rows) {
            $out = fopen('php://output', 'w');
            fputcsv($out, ['Instructor Name', 'Days Present', 'Total Hours']);
            foreach ($rows as $row) {
                fputcsv($out, $row);
            }
            fclose($out);
        }, $filename, [
            'Content-Type' => 'text/csv',
        ]);
    }
}
