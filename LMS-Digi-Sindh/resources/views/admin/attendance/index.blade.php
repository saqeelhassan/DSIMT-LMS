@extends('layouts.admin')

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <h1 class="h3 mb-2 mb-sm-0">Instructor attendance (correction)</h1>
        <p class="mb-0 text-body">View and edit check-in/check-out times. Download payroll report below.</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
@endif

<div class="card shadow mb-4">
    <div class="card-body">
        <form method="get" action="{{ route('admin.attendance.index') }}" class="row g-2 align-items-end mb-4">
            <div class="col-auto">
                <label for="date" class="form-label mb-0">Date</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ $date }}">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Show</button>
            </div>
        </form>

        <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
            <span class="fw-medium">Payroll report (CSV):</span>
            <form method="get" action="{{ route('admin.attendance.payroll-csv') }}" class="d-inline-flex gap-2 align-items-center">
                <input type="month" name="month" value="{{ \Carbon\Carbon::parse($date)->format('Y-m') }}" class="form-control form-control-sm" style="width:auto">
                <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-download me-1"></i>Download CSV</button>
            </form>
            <span class="small text-body-secondary">Instructor Name | Days Present | Total Hours</span>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered align-middle mb-0">
                <thead>
                    <tr>
                        <th>Instructor</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Hours</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($records as $r)
                    <tr>
                        <td>{{ $r->instructor->name ?? $r->instructor->email }}</td>
                        <td>{{ $r->check_in_time ? $r->check_in_time->format('h:i A') : '—' }}</td>
                        <td>{{ $r->check_out_time ? $r->check_out_time->format('h:i A') : '—' }}</td>
                        <td>
                            @if($r->check_in_time && $r->check_out_time)
                                {{ floor($r->worked_minutes / 60) }}h {{ $r->worked_minutes % 60 }}m
                            @else
                                —
                            @endif
                        </td>
                        <td><a href="{{ route('admin.attendance.edit', $r) }}" class="btn btn-sm btn-outline-primary">Edit</a></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-body py-4">No instructor attendance for this date.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
