@extends('layouts.account', ['account' => 'instructor'])

@section('content')
<div class="col-xl-9">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <a href="{{ route('instructor.manage-course') }}" class="text-body small d-block mb-1"><i class="bi bi-arrow-left me-1"></i>Back to courses</a>
            <h1 class="h3 mb-1">Assignments: {{ $course->name }}</h1>
            <p class="mb-0 text-body">Create assignments, set deadlines, grade submissions.</p>
        </div>
        <a href="{{ route('instructor.assignments.create', $course) }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i>Create assignment</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border rounded-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Assignment</th>
                            <th>Total marks</th>
                            <th>Due date</th>
                            <th>Submissions</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($assignments as $a)
                        <tr>
                            <td>
                                <h6 class="mb-0">{{ $a->title }}</h6>
                                @if($a->description)<small class="text-body">{{ Str::limit($a->description, 60) }}</small>@endif
                            </td>
                            <td>{{ $a->total_marks }}</td>
                            <td>{{ $a->due_date?->format('M d, Y') ?? '—' }}</td>
                            <td>{{ $a->submissions_count }}</td>
                            <td>
                                <a href="{{ route('instructor.assignments.submissions', [$course, $a]) }}" class="btn btn-sm btn-outline-primary">Grade submissions</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-body">No assignments yet. <a href="{{ route('instructor.assignments.create', $course) }}">Create one</a>.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($assignments->hasPages())
                <div class="d-flex justify-content-center mt-3">{{ $assignments->links() }}</div>
            @endif
        </div>
    </div>
</div>
@endsection
