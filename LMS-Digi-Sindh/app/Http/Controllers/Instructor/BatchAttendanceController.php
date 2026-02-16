<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\StudentAttendance;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class BatchAttendanceController extends Controller
{
    private function authorizeBatch(Batch $batch): void
    {
        $user = auth()->user();
        if ($batch->instructor_id !== $user->id && $user->role?->name !== 'SuperAdmin') {
            abort(403, 'You can only manage attendance for your own batches.');
        }
    }

    public function index(Batch $batch): View|RedirectResponse
    {
        $this->authorizeBatch($batch);

        $dates = StudentAttendance::where('batch_id', $batch->id)
            ->select('date')
            ->distinct()
            ->orderByDesc('date')
            ->limit(50)
            ->pluck('date')
            ->map(fn ($d) => $d->format('Y-m-d'));

        return view('instructor.batches.attendance-index', compact('batch', 'dates'));
    }

    public function take(Batch $batch, Request $request): View|RedirectResponse
    {
        $this->authorizeBatch($batch);
        $dateInput = $request->get('date', now()->format('Y-m-d'));
        $sessionDate = Carbon::parse($dateInput)->startOfDay();

        $enrollments = $batch->enrollments()
            ->with('user.userDetail')
            ->orderBy('id')
            ->get();

        $existing = StudentAttendance::where('batch_id', $batch->id)
            ->whereDate('date', $sessionDate)
            ->get()
            ->keyBy('student_id');

        return view('instructor.batches.attendance-take', compact('batch', 'sessionDate', 'enrollments', 'existing'));
    }

    public function store(Request $request, Batch $batch): RedirectResponse
    {
        $this->authorizeBatch($batch);

        $validated = $request->validate([
            'date' => ['required', 'date'],
            'mode' => ['required', 'string', 'in:Physical,Online'],
            'attendance' => ['required', 'array'],
            'attendance.*' => ['required', 'string', 'in:Present,Absent,Late,Leave'],
        ]);

        $sessionDate = $validated['date'];
        $mode = $validated['mode'];
        $allowedStudentIds = $batch->enrollments()->pluck('user_id');

        DB::transaction(function () use ($batch, $sessionDate, $mode, $validated, $allowedStudentIds) {
            foreach ($validated['attendance'] as $studentId => $status) {
                if (! $allowedStudentIds->contains((int) $studentId)) {
                    continue;
                }
                StudentAttendance::updateOrCreate(
                    [
                        'student_id' => $studentId,
                        'batch_id' => $batch->id,
                        'date' => $sessionDate,
                    ],
                    [
                        'status' => $status,
                        'mode' => $mode,
                        'marked_by' => auth()->id(),
                        'login_time' => $mode === StudentAttendance::MODE_ONLINE ? now() : null,
                    ]
                );
            }
        });

        return redirect()->route('instructor.batches.attendance.index', $batch)
            ->with('success', 'Attendance saved successfully.');
    }

    public function view(Batch $batch, string $date): View|RedirectResponse
    {
        $this->authorizeBatch($batch);
        $sessionDate = Carbon::parse($date)->startOfDay();

        $attendances = StudentAttendance::where('batch_id', $batch->id)
            ->whereDate('date', $sessionDate)
            ->with(['student.userDetail', 'markedByUser'])
            ->get();

        return view('instructor.batches.attendance-view', compact('batch', 'sessionDate', 'attendances'));
    }
}
