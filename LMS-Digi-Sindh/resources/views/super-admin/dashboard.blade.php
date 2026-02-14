@extends('layouts.super-admin')

@section('content')
@if(isset($overdueCount) && ($overdueCount > 0 || ($markedOverdue ?? 0) > 0))
<div class="row mb-4">
    <div class="col-12">
        <div class="alert alert-danger border-0 d-flex align-items-center justify-content-between flex-wrap gap-2 mb-0">
            <div>
                <strong><i class="fas fa-exclamation-triangle me-2"></i>Overdue fee vouchers</strong>
                <span class="ms-2">{{ $overdueCount }} invoice(s) past due date. The overdue check runs when you open this dashboard.</span>
                @if(($markedOverdue ?? 0) > 0)
                    <span class="d-block small mt-1">{{ $markedOverdue }} were just marked overdue.</span>
                @endif
            </div>
            <a href="{{ route('admin.invoices.index', ['status' => 'overdue']) }}" class="btn btn-sm btn-danger">View overdue</a>
        </div>
    </div>
</div>
@endif

@php $currency = \App\Models\Setting::get('currency', 'PKR'); @endphp

<!-- Executive: Revenue -->
<div class="row g-4 mb-4">
    <div class="col-md-6 col-xl-3">
        <div class="card card-body bg-success bg-opacity-15 p-4 h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-0 fw-bold" style="font-size: calc(1.5rem - 1px);">{{ number_format($feesCollectedTotal ?? 0) }} {{ $currency }}</h2>
                    <span class="mb-0 h6 fw-light">Total Collected</span>
                </div>
                <div class="icon-lg rounded-circle bg-success text-white mb-0"><i class="fas fa-money-bill-wave fa-fw"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card card-body bg-warning bg-opacity-15 p-4 h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-0 fw-bold" style="font-size: calc(1.5rem - 1px);">{{ number_format($feesPendingTotal ?? 0) }} {{ $currency }}</h2>
                    <span class="mb-0 h6 fw-light">Pending Dues</span>
                </div>
                <div class="icon-lg rounded-circle bg-warning text-white mb-0"><i class="fas fa-clock fa-fw"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card card-body bg-primary bg-opacity-15 p-4 h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-0 fw-bold" style="font-size: calc(1.5rem - 1px);">{{ number_format($feesCollectedMonth ?? 0) }} {{ $currency }}</h2>
                    <span class="mb-0 h6 fw-light">This Month</span>
                </div>
                <div class="icon-lg rounded-circle bg-primary text-white mb-0"><i class="fas fa-calendar-alt fa-fw"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card card-body bg-purple bg-opacity-10 p-4 h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-0 fw-bold" style="font-size: calc(1.5rem - 1px);">{{ number_format($feesCollectedYear ?? 0) }} {{ $currency }}</h2>
                    <span class="mb-0 h6 fw-light">This Year</span>
                </div>
                <div class="icon-lg rounded-circle bg-purple text-white mb-0"><i class="fas fa-chart-line fa-fw"></i></div>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-12 mt-2">
        <a href="{{ route('admin.invoices.index', ['status' => 'overdue']) }}" class="text-decoration-none">
            <div class="card card-body {{ ($overdueCount ?? 0) > 0 ? 'bg-danger bg-opacity-15 border-danger' : 'bg-light border' }} p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-0 fw-bold">{{ $overdueCount ?? 0 }}</h2>
                        <span class="mb-0 h6 fw-light">Overdue invoices</span>
                        <span class="d-block small text-body-secondary mt-1">Fee vouchers past due date. Click to view or go to Defaulter List.</span>
                    </div>
                    <div class="icon-lg rounded-circle {{ ($overdueCount ?? 0) > 0 ? 'bg-danger' : 'bg-secondary' }} text-white mb-0"><i class="fas fa-exclamation-triangle fa-fw"></i></div>
                </div>
            </div>
        </a>
    </div>
</div>

<!-- Enrollment Stats & Expenses -->
<div class="row g-4 mb-4">
    <div class="col-md-6 col-xl-4">
        <div class="card card-body bg-primary bg-opacity-15 p-4 h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-0 fw-bold" style="font-size: calc(1.5rem - 1px);">{{ $activeEnrollments ?? 0 }}</h2>
                    <span class="mb-0 h6 fw-light">Active Students</span>
                </div>
                <div class="icon-lg rounded-circle bg-primary text-white mb-0"><i class="fas fa-user-graduate fa-fw"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card card-body bg-danger bg-opacity-15 p-4 h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-0 fw-bold" style="font-size: calc(1.5rem - 1px);">{{ $dropoutCount ?? 0 }}</h2>
                    <span class="mb-0 h6 fw-light">Dropouts</span>
                </div>
                <div class="icon-lg rounded-circle bg-danger text-white mb-0"><i class="fas fa-user-times fa-fw"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <a href="{{ route('super-admin.expenses.index') }}" class="text-decoration-none">
            <div class="card card-body bg-secondary bg-opacity-15 p-4 h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-0 fw-bold" style="font-size: calc(1.5rem - 1px);">{{ number_format($expensesThisYear ?? 0) }} {{ $currency }}</h2>
                        <span class="mb-0 h6 fw-light">Expenses (Year)</span>
                        <span class="small text-body d-block mt-1">Month: {{ number_format($expensesThisMonth ?? 0) }}</span>
                    </div>
                    <div class="icon-lg rounded-circle bg-secondary text-white mb-0"><i class="fas fa-receipt fa-fw"></i></div>
                </div>
            </div>
        </a>
    </div>
</div>

<!-- Stats -->
<div class="row g-4 mb-4">
    <div class="col-md-6 col-xxl-3">
        <div class="card card-body bg-primary bg-opacity-15 p-4 h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-0 fw-bold">{{ $totalCourses ?? 0 }}</h2>
                    <span class="mb-0 h6 fw-light">Total Courses</span>
                </div>
                <div class="icon-lg rounded-circle bg-primary text-white mb-0"><i class="fas fa-tv fa-fw"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xxl-3">
        <div class="card card-body bg-purple bg-opacity-10 p-4 h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-0 fw-bold">{{ $totalEnrollments ?? 0 }}</h2>
                    <span class="mb-0 h6 fw-light">Total Enrollments</span>
                </div>
                <div class="icon-lg rounded-circle bg-purple text-white mb-0"><i class="fas fa-user-graduate fa-fw"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xxl-3">
        <div class="card card-body bg-success bg-opacity-10 p-4 h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-0 fw-bold">{{ $totalUsers ?? 0 }}</h2>
                    <span class="mb-0 h6 fw-light">Total Users</span>
                </div>
                <div class="icon-lg rounded-circle bg-success text-white mb-0"><i class="fas fa-users fa-fw"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xxl-3">
        <div class="card card-body bg-warning bg-opacity-15 p-4 h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-0 fw-bold">{{ $instructorsCount ?? 0 }}</h2>
                    <span class="mb-0 h6 fw-light">Instructors</span>
                </div>
                <div class="icon-lg rounded-circle bg-warning text-white mb-0"><i class="fas fa-chalkboard-teacher fa-fw"></i></div>
            </div>
        </div>
    </div>
</div>

<!-- Pending registrations (Student / Staff awaiting approval) -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header border-bottom p-4 d-flex justify-content-between align-items-center">
                <h5 class="card-header-title mb-0" style="font-size: calc(1.25rem - 3px);">Pending registrations</h5>
                @if(isset($pendingRegistrations) && $pendingRegistrations->count() > 0)
                    <span class="badge bg-warning">{{ $pendingRegistrations->count() }} awaiting approval</span>
                @endif
            </div>
            <div class="card-body p-0">
                @if(session('success'))
                    <div class="alert alert-success mb-0 rounded-0 border-0 border-bottom">{{ session('success') }}</div>
                @endif
                @if(isset($pendingRegistrations) && $pendingRegistrations->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Mobile</th>
                                    <th>Registered</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pendingRegistrations as $u)
                                    <tr>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td><span class="badge bg-secondary">{{ $u->role?->name ?? '—' }}</span></td>
                                        <td>{{ $u->userDetail?->mobile ?? '—' }}</td>
                                        <td>{{ $u->created_at?->format('M j, Y H:i') ?? '—' }}</td>
                                        <td class="text-end">
                                            <form method="post" action="{{ route('super-admin.registrations.approve', $u) }}" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                            </form>
                                            <form method="post" action="{{ route('super-admin.registrations.reject', $u) }}" class="d-inline" onsubmit="return confirm('Reject and remove this registration?');">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Reject</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="mb-0 p-4 text-body">No pending registrations.</p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
