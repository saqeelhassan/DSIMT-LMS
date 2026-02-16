@extends('layouts.account', ['account' => 'instructor'])

@section('content')
<div class="col-xl-9">
    <div class="mb-4">
        <a href="{{ route('instructor.dashboard') }}" class="text-body small d-block mb-1"><i class="bi bi-arrow-left me-1"></i>Dashboard</a>
        <h1 class="h3 mb-1">My Batches</h1>
        <p class="mb-0 text-body">Select a batch to mark student attendance (Physical or Online).</p>
    </div>

    <div class="card border rounded-3">
        <div class="card-header bg-light">
            <h5 class="mb-0">Batches assigned to you</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Batch</th>
                            <th>Course</th>
                            <th>Branch</th>
                            <th>Students</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($batches as $b)
                        <tr>
                            <td>
                                <strong>{{ $b->name }}</strong>
                                @if(!$b->is_active)<span class="badge bg-secondary ms-1">Inactive</span>@endif
                            </td>
                            <td>{{ $b->course->name ?? '—' }}</td>
                            <td>{{ $b->branch->name ?? '—' }}</td>
                            <td>{{ $b->enrollments_count }}</td>
                            <td class="text-end">
                                <a href="{{ route('instructor.batches.attendance.index', $b) }}" class="btn btn-sm btn-success-soft"><i class="bi bi-person-check me-1"></i>Attendance</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-body py-4">No batches assigned to you yet.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
