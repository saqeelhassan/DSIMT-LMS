@extends('layouts.account', ['account' => 'instructor'])

@section('content')
<div class="col-xl-9">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1">My courses</h1>
            <p class="mb-0 text-body">Manage your courses, exams, and attendance.</p>
        </div>
        <a href="{{ route('instructor.courses.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i>Create course</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border rounded-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Mode</th>
                            <th>Enrolled</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($courses as $course)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ $course->image_url }}" class="rounded me-2" alt="" style="width:50px;height:38px;object-fit:cover">
                                    <div>
                                        <h6 class="mb-0">{{ $course->name }}</h6>
                                        <small class="text-body">{{ $course->total_lectures ?? 0 }} lectures</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-primary bg-opacity-10 text-primary">{{ $course->courseMode?->name ?? '—' }}</span></td>
                            <td>{{ number_format($course->enrollments_count) }}</td>
                            <td>
                                <div class="d-flex gap-1 flex-wrap">
                                    @if($course->live_class_url)
                                        <a href="{{ $course->live_class_url }}" target="_blank" class="btn btn-sm btn-danger" title="Start Zoom/Meet Class"><i class="bi bi-camera-video"></i> Live</a>
                                    @endif
                                    <a href="{{ route('instructor.courses.edit', $course) }}" class="btn btn-sm btn-outline-primary" title="Edit"><i class="far fa-edit"></i></a>
                                    <a href="{{ route('instructor.content.index', $course) }}" class="btn btn-sm btn-outline-secondary" title="Content"><i class="bi bi-file-earmark"></i></a>
                                    <a href="{{ route('instructor.assignments.index', $course) }}" class="btn btn-sm btn-outline-dark" title="Assignments"><i class="bi bi-journal-check"></i></a>
                                    <a href="{{ route('instructor.exams.index', $course) }}" class="btn btn-sm btn-outline-info" title="Exams"><i class="bi bi-journal-text"></i></a>
                                    <a href="{{ route('instructor.attendance.index', $course) }}" class="btn btn-sm btn-outline-success" title="Attendance"><i class="bi bi-person-check"></i></a>
                                    <a href="{{ route('instructor.progress.index', $course) }}" class="btn btn-sm btn-outline-warning" title="Progress"><i class="bi bi-graph-up"></i></a>
                                    <form method="post" action="{{ route('instructor.courses.destroy', $course) }}" class="d-inline" onsubmit="return confirm('Delete this course?');">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-outline-danger" title="Delete"><i class="far fa-trash-alt"></i></button></form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-body">No courses yet. <a href="{{ route('instructor.courses.create') }}">Create your first course</a>.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($courses->hasPages())
                <div class="d-flex justify-content-center mt-3">{{ $courses->links() }}</div>
            @endif
        </div>
    </div>
</div>
@endsection
