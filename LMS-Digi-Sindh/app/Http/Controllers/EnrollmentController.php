<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    /**
     * Enroll the current user in a course.
     */
    public function store(Request $request, Course $course): RedirectResponse
    {
        $user = Auth::user();

        if (Enrollment::where('user_id', $user->id)->where('course_id', $course->id)->exists()) {
            return redirect()->back()->with('info', 'You are already enrolled in this course.');
        }

        $validated = $request->validate([
            'payment_method_id' => ['nullable', 'integer', 'exists:payment_methods,id'],
            'payment_status' => ['nullable', 'string', 'max:50'],
        ]);

        Enrollment::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
            'payment_method_id' => $validated['payment_method_id'] ?? null,
            'payment_status' => $validated['payment_status'] ?? 'pending',
        ]);

        return redirect()
            ->back()
            ->with('success', 'You have been enrolled in this course. View it in <a href="' . route('student.courses') . '" class="alert-link">My Courses</a>.');
    }
}
