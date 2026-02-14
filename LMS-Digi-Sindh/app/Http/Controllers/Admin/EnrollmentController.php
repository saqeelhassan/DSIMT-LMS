<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of enrollments for the admin dashboard.
     */
    public function index(Request $request): View
    {
        $enrollments = Enrollment::with(['user.userDetail', 'course', 'batch'])
            ->when($request->filled('course'), fn ($q) => $q->where('course_id', $request->course))
            ->when($request->filled('status'), fn ($q) => $q->where('enrollment_status', $request->status))
            ->latest('created_at')
            ->paginate(15)
            ->withQueryString();

        $courses = Course::orderBy('name')->get();

        return view('admin.enrollments.index', compact('enrollments', 'courses'));
    }
}
