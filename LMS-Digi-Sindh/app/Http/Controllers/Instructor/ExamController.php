<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Exam;
use App\Models\ExamSubmission;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExamController extends Controller
{
    public function index(Course $course): View|RedirectResponse
    {
        $this->authorizeInstructorCourse($course);
        $exams = $course->exams()->withCount('submissions')->latest()->paginate(10);

        return view('instructor.exam.index', compact('course', 'exams'));
    }

    public function create(Course $course): View|RedirectResponse
    {
        $this->authorizeInstructorCourse($course);

        return view('instructor.exam.create', compact('course'));
    }

    public function store(Request $request, Course $course): RedirectResponse
    {
        $this->authorizeInstructorCourse($course);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'total_marks' => ['required', 'integer', 'min:1', 'max:1000'],
            'passing_marks' => ['nullable', 'integer', 'min:0'],
            'due_date' => ['nullable', 'date'],
        ]);

        $course->exams()->create([
            ...$validated,
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('instructor.exams.index', $course)->with('success', 'Exam created successfully.');
    }

    public function submissions(Course $course, Exam $exam): View|RedirectResponse
    {
        $this->authorizeInstructorCourse($course);
        if ($exam->course_id !== $course->id) {
            abort(404);
        }

        $enrolledUserIds = $course->enrollments()->pluck('user_id');
        $submissions = ExamSubmission::where('exam_id', $exam->id)
            ->whereIn('user_id', $enrolledUserIds)
            ->with('user.userDetail')
            ->get()
            ->keyBy('user_id');

        // Build list: all enrolled students with their submission (or null)
        $students = $course->enrollments()->with('user.userDetail')->get()->map(function ($e) use ($submissions) {
            return (object) [
                'user' => $e->user,
                'submission' => $submissions->get($e->user_id),
            ];
        });

        return view('instructor.exam.submissions', compact('course', 'exam', 'students'));
    }

    public function markForm(Course $course, Exam $exam, User $user): View|RedirectResponse
    {
        $this->authorizeInstructorCourse($course);
        if ($exam->course_id !== $course->id) {
            abort(404);
        }
        if (!$course->enrollments()->where('user_id', $user->id)->exists()) {
            abort(403, 'Student is not enrolled in this course.');
        }

        $submission = ExamSubmission::firstOrCreate(
            ['exam_id' => $exam->id, 'user_id' => $user->id],
            ['status' => 'pending']
        );
        $submission->load('user.userDetail');

        return view('instructor.exam.mark', compact('course', 'exam', 'submission'));
    }

    public function mark(Request $request, Course $course, Exam $exam, User $user): RedirectResponse
    {
        $this->authorizeInstructorCourse($course);
        if ($exam->course_id !== $course->id) {
            abort(404);
        }
        if (!$course->enrollments()->where('user_id', $user->id)->exists()) {
            abort(403, 'Student is not enrolled in this course.');
        }

        $submission = ExamSubmission::firstOrCreate(
            ['exam_id' => $exam->id, 'user_id' => $user->id],
            ['status' => 'pending']
        );

        $validated = $request->validate([
            'marks_obtained' => ['required', 'numeric', 'min:0', 'max:' . $exam->total_marks],
            'feedback' => ['nullable', 'string', 'max:2000'],
        ]);

        $submission->update([
            'marks_obtained' => $validated['marks_obtained'],
            'feedback' => $validated['feedback'] ?? null,
            'marked_at' => now(),
            'marked_by' => auth()->id(),
            'status' => 'marked',
        ]);

        return redirect()->route('instructor.exams.submissions', [$course, $exam])
            ->with('success', 'Submission marked successfully.');
    }


    private function authorizeInstructorCourse(Course $course): void
    {
        $user = auth()->user();
        if ($course->instructor_id !== $user->id && $user->role?->name !== 'SuperAdmin') {
            abort(403, 'You can only manage exams for your own courses.');
        }
    }
}
