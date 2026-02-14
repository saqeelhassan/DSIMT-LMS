<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamSubmission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExamController extends Controller
{
    public function index(): View
    {
        $enrolledCourseIds = auth()->user()->enrollments()->pluck('course_id');
        $exams = Exam::whereIn('course_id', $enrolledCourseIds)
            ->with(['course', 'submissions' => fn ($q) => $q->where('user_id', auth()->id())])
            ->latest()
            ->paginate(10);

        return view('student.exam.index', compact('exams'));
    }

    public function submitForm(Exam $exam): View|RedirectResponse
    {
        $user = auth()->user();
        $enrollment = $user->enrollments()->where('course_id', $exam->course_id)->first();
        if (!$enrollment) {
            abort(403, 'You are not enrolled in this course.');
        }

        $submission = ExamSubmission::firstOrCreate(
            ['exam_id' => $exam->id, 'user_id' => $user->id],
            ['status' => 'pending']
        );

        if ($submission->status === 'marked') {
            return redirect()->route('student.exams.index')->with('info', 'You have already submitted this exam.');
        }

        $exam->load('course');

        return view('student.exam.submit', compact('exam', 'submission'));
    }

    public function submit(Request $request, Exam $exam): RedirectResponse
    {
        $user = auth()->user();
        $enrollment = $user->enrollments()->where('course_id', $exam->course_id)->first();
        if (!$enrollment) {
            abort(403, 'You are not enrolled in this course.');
        }

        $validated = $request->validate([
            'answer_content' => ['required', 'string', 'max:50000'],
        ]);

        $submission = ExamSubmission::firstOrCreate(
            ['exam_id' => $exam->id, 'user_id' => $user->id],
            ['status' => 'pending']
        );

        if ($submission->status === 'marked') {
            return redirect()->route('student.exams.index')->with('info', 'This exam has already been marked.');
        }

        $submission->update([
            'answer_content' => $validated['answer_content'],
            'submitted_at' => now(),
            'status' => 'submitted',
        ]);

        return redirect()->route('student.exams.index')->with('success', 'Exam submitted successfully. Your instructor will mark it shortly.');
    }
}
