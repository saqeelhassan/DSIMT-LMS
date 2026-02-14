<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\Course;
use App\Models\CourseMode;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $courses = Course::with('courseMode')
            ->when($request->filled('q'), fn ($q) => $q->where('name', 'like', '%' . $request->q . '%'))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $totalCourses = Course::count();

        return view('admin.course.course-list', compact('courses', 'totalCourses'));
    }

    public function create(): RedirectResponse
    {
        return redirect()->route('instructor.courses.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'course_mode_id' => ['required', 'integer', 'exists:course_modes,id'],
            'description' => ['nullable', 'string', 'max:5000'],
            'release_date' => ['nullable', 'date'],
            'total_hours' => ['nullable', 'string', 'max:50'],
            'certificate' => ['nullable', 'boolean'],
            'skills' => ['nullable', 'string', 'max:255'],
            'total_lectures' => ['nullable', 'integer', 'min:0'],
            'language' => ['nullable', 'string', 'max:100'],
            'instructor_id' => ['nullable', 'integer', 'exists:users,id'],
        ]);

        $course = Course::create([
            'name' => $validated['name'],
            'course_mode_id' => $validated['course_mode_id'],
            'description' => $validated['description'] ?? null,
            'release_date' => $validated['release_date'] ?? null,
            'total_hours' => $validated['total_hours'] ?? null,
            'certificate' => $request->boolean('certificate'),
            'skills' => $validated['skills'] ?? null,
            'total_lectures' => $validated['total_lectures'] ?? null,
            'language' => $validated['language'] ?? null,
            'instructor_id' => $validated['instructor_id'] ?? null,
        ]);
        AuditLog::log('course_created', Course::class, $course->id, auth()->user()->name . " created course: {$course->name}");

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
    }

    public function edit(Course $course): View
    {
        $courseModes = CourseMode::where('is_active', true)->orderBy('name')->get();
        $instructors = User::whereHas('role', fn ($q) => $q->where('name', 'Instructor'))
            ->where('is_active', true)
            ->orderBy('email')
            ->get();

        return view('admin.course.course-edit', compact('course', 'courseModes', 'instructors'));
    }

    public function update(Request $request, Course $course): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'course_mode_id' => ['required', 'integer', 'exists:course_modes,id'],
            'description' => ['nullable', 'string', 'max:5000'],
            'release_date' => ['nullable', 'date'],
            'total_hours' => ['nullable', 'string', 'max:50'],
            'certificate' => ['nullable', 'boolean'],
            'skills' => ['nullable', 'string', 'max:255'],
            'total_lectures' => ['nullable', 'integer', 'min:0'],
            'language' => ['nullable', 'string', 'max:100'],
            'instructor_id' => ['nullable', 'integer', 'exists:users,id'],
        ]);

        $course->update([
            'name' => $validated['name'],
            'course_mode_id' => $validated['course_mode_id'],
            'description' => $validated['description'] ?? null,
            'release_date' => $validated['release_date'] ?? null,
            'total_hours' => $validated['total_hours'] ?? null,
            'certificate' => $request->boolean('certificate'),
            'skills' => $validated['skills'] ?? null,
            'total_lectures' => $validated['total_lectures'] ?? null,
            'language' => $validated['language'] ?? null,
            'instructor_id' => $validated['instructor_id'] ?? null,
        ]);
        AuditLog::log('course_updated', Course::class, $course->id, auth()->user()->name . " updated course: {$course->name}");

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    }

    public function show(Course $course)
    {
        $course->load('courseMode', 'instructor')->loadCount('enrollments');

        return view('admin.course.course-detail', compact('course'));
    }
}
