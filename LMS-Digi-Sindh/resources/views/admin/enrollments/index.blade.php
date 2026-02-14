@extends('layouts.admin')

@section('content')
<div class="row mb-3">
    <div class="col-12 d-sm-flex justify-content-between align-items-center">
        <h1 class="h3 mb-2 mb-sm-0">Enrollments</h1>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-secondary mb-0">Back to Dashboard</a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header border-bottom p-4">
                <form method="get" action="{{ route('admin.enrollments.index') }}" class="row g-2 align-items-center flex-wrap">
                    <div class="col-md-3">
                        <label class="form-label small mb-0">Course</label>
                        <select name="course" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="">All Courses</option>
                            @foreach($courses as $c)
                                <option value="{{ $c->id }}" {{ request('course') == $c->id ? 'selected' : '' }}>{{ Str::limit($c->name, 40) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label small mb-0">Status</label>
                        <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="">All</option>
                            <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="card-body p-0">
                @if(session('success'))
                    <div class="alert alert-success mb-0 rounded-0 border-0 border-bottom">{{ session('success') }}</div>
                @endif
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Student</th>
                                <th>Course</th>
                                <th>Batch</th>
                                <th>Status</th>
                                <th>Payment</th>
                                <th>Enrolled</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($enrollments as $enrollment)
                                <tr>
                                    <td>{{ $enrollment->user->name ?? $enrollment->user->email }}</td>
                                    <td>{{ $enrollment->course?->name ?? '—' }}</td>
                                    <td>{{ $enrollment->batch?->name ?? '—' }}</td>
                                    <td>
                                        <span class="badge {{ match($enrollment->enrollment_status ?? '') {
                                            'active' => 'bg-success',
                                            'completed' => 'bg-info',
                                            'cancelled' => 'bg-secondary',
                                            default => 'bg-light text-dark'
                                        } }}">{{ $enrollment->enrollment_status ?? '—' }}</span>
                                    </td>
                                    <td>{{ $enrollment->payment_status ?? '—' }}</td>
                                    <td>{{ $enrollment->created_at?->format('M j, Y') ?? '—' }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="6" class="text-center py-4 text-body">No enrollments yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($enrollments->hasPages())
                    <div class="card-footer border-top py-2">
                        {{ $enrollments->withQueryString()->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
