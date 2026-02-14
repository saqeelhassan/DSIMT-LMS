@extends('layouts.admin')

@section('content')
<div class="row mb-3">
    <div class="col-12 d-sm-flex justify-content-between align-items-center">
        <h1 class="h3 mb-2 mb-sm-0">Batches</h1>
        <a href="{{ route('admin.batches.create') }}" class="btn btn-sm btn-primary mb-0">Add Batch</a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header border-bottom p-4">
                <form method="get" action="{{ route('admin.batches.index') }}" class="row g-2 align-items-center">
                    <div class="col-md-4">
                        <select name="course" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="">All Courses</option>
                            @foreach($courses as $c)
                                <option value="{{ $c->id }}" {{ request('course') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                            @endforeach
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
                                <th>Batch</th>
                                <th>Course</th>
                                <th>Instructor</th>
                                <th>Branch</th>
                                <th>Schedule</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($batches as $batch)
                                <tr>
                                    <td>{{ $batch->name }}</td>
                                    <td>{{ $batch->course?->name ?? '—' }}</td>
                                    <td>{{ $batch->instructor?->name ?? '—' }}</td>
                                    <td>{{ $batch->branch?->name ?? '—' }}</td>
                                    <td>{{ $batch->schedule_note ?? '—' }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.batches.edit', $batch) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                        <a href="{{ route('admin.batches.timetable', $batch) }}" class="btn btn-sm btn-outline-secondary">Timetable</a>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="6" class="text-center py-4 text-body">No batches yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($batches->hasPages())
                    <div class="card-footer border-top py-2">
                        {{ $batches->withQueryString()->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
