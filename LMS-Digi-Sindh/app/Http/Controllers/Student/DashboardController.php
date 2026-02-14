<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\ContentProgress;
use App\Models\TimetableSlot;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $enrollmentsCount = $user ? $user->enrollments()->count() : 0;
        $enrollments = $user
            ? $user->enrollments()->with(['course.contents'])->latest()->get()
            : collect();

        $resumeLearning = null;
        if ($user) {
            $lastProgress = ContentProgress::where('user_id', $user->id)
                ->whereNotNull('last_watched_at')
                ->with('courseContent.course')
                ->orderByDesc('last_watched_at')
                ->first();
            if ($lastProgress && $lastProgress->courseContent && $lastProgress->courseContent->course) {
                $course = $lastProgress->courseContent->course;
                if ($user->enrollments()->where('course_id', $course->id)->exists()) {
                    $resumeLearning = (object) [
                        'course' => $course,
                        'content' => $lastProgress->courseContent,
                    ];
                }
            }
        }

        $todaySchedule = collect();
        if ($user && $enrollments->isNotEmpty()) {
            $batchIds = $enrollments->pluck('batch_id')->filter();
            $dayOfWeek = Carbon::now()->dayOfWeek;
            $slots = TimetableSlot::whereIn('batch_id', $batchIds)
                ->where('day_of_week', $dayOfWeek)
                ->with('batch.course')
                ->orderBy('start_time')
                ->get();
            foreach ($slots as $slot) {
                if ($slot->batch && $slot->batch->course) {
                    $todaySchedule->push((object) [
                        'slot' => $slot,
                        'course' => $slot->batch->course,
                        'batch' => $slot->batch,
                    ]);
                }
            }
        }

        $completedLessonsCount = $user
            ? ContentProgress::where('user_id', $user->id)->where('completed', true)->count()
            : 0;
        $certificatesCount = $user
            ? $user->enrollments()->whereNotNull('completed_at')->count()
            : 0;

        return view('student.dashboard', compact(
            'enrollmentsCount',
            'enrollments',
            'completedLessonsCount',
            'certificatesCount',
            'resumeLearning',
            'todaySchedule'
        ));
    }

    public function courseList()
    {
        $user = Auth::user();
        $enrollments = $user
            ? $user->enrollments()->with(['course.courseMode'])->latest()->paginate(10)
            : new LengthAwarePaginator([], 0, 10);

        return view('student.course-list', compact('enrollments'));
    }

    public function courseResume()
    {
        return view('student.course-resume');
    }

    public function bookmark()
    {
        return view('student.bookmark');
    }

    public function paymentInfo()
    {
        return view('student.payment-info');
    }

    public function quiz()
    {
        return view('student.quiz');
    }

    public function subscription()
    {
        return view('student.subscription');
    }
}
