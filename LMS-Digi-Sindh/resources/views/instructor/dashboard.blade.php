@extends('layouts.account', ['account' => 'instructor'])

@section('content')
<!-- Main content START -->
<div class="col-xl-9">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ session('error') }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
    @endif

    <!-- Instructor attendance (check-in / check-out) START -->
    <div class="card border rounded-3 mb-4">
        <div class="card-body p-4">
            <h5 class="card-title mb-3"><i class="bi bi-clock-history me-2"></i>My attendance today</h5>
            @if($todayAttendance)
                <p class="mb-2 text-body">
                    @if($todayAttendance->check_in_time)
                        <span class="text-success fw-semibold">Checked in</span> at {{ $todayAttendance->check_in_time->format('g:i A') }}.
                    @endif
                    @if($todayAttendance->check_out_time)
                        <span class="text-primary fw-semibold">Checked out</span> at {{ $todayAttendance->check_out_time->format('g:i A') }}.
                        @if($todayAttendance->worked_minutes)
                            <span class="d-block small mt-1">Total: {{ floor($todayAttendance->worked_minutes / 60) }}h {{ $todayAttendance->worked_minutes % 60 }}m</span>
                        @endif
                    @endif
                </p>
                <div class="d-flex gap-2 flex-wrap">
                    @if(!$todayAttendance->check_in_time)
                        <form method="post" action="{{ route('instructor.check-in') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success btn-lg" {{ $checkInAllowed ? '' : 'disabled title="Check-in only allowed from institute network"' }}>
                                <i class="bi bi-box-arrow-in-right me-2"></i>Check In
                            </button>
                        </form>
                    @endif
                    @if($todayAttendance->check_in_time && !$todayAttendance->check_out_time)
                        <form method="post" action="{{ route('instructor.check-out') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary btn-lg"><i class="bi bi-box-arrow-right me-2"></i>Check Out</button>
                        </form>
                    @endif
                </div>
                @if(!$checkInAllowed && !$todayAttendance->check_in_time)
                    <p class="small text-warning mb-0 mt-2">Check-in is restricted to institute Wi‑Fi. Ask admin to add your IP to allowed list if you are on-site.</p>
                @endif
            @else
                <p class="mb-2 text-body">You have not checked in today.</p>
                <form method="post" action="{{ route('instructor.check-in') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-success btn-lg" {{ $checkInAllowed ? '' : 'disabled title="Check-in only allowed from institute network"' }}>
                        <i class="bi bi-box-arrow-in-right me-2"></i>Check In
                    </button>
                </form>
                @if(!$checkInAllowed)
                    <p class="small text-warning mb-0 mt-2">Check-in is restricted to institute Wi‑Fi.</p>
                @endif
            @endif
        </div>
    </div>
    <!-- Instructor attendance END -->

    <!-- Counter boxes START -->
    <div class="row g-4">
        <div class="col-sm-6 col-lg-4">
            <div class="d-flex justify-content-center align-items-center p-4 bg-warning bg-opacity-15 rounded-3">
                <span class="display-6 text-warning mb-0"><i class="fas fa-tv fa-fw"></i></span>
                <div class="ms-4">
                    <h5 class="mb-0 fw-bold">{{ $totalCourses }}</h5>
                    <span class="mb-0 h6 fw-light">My Courses</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="d-flex justify-content-center align-items-center p-4 bg-purple bg-opacity-10 rounded-3">
                <span class="display-6 text-purple mb-0"><i class="fas fa-user-graduate fa-fw"></i></span>
                <div class="ms-4">
                    <h5 class="mb-0 fw-bold">{{ number_format($distinctStudents) }}</h5>
                    <span class="mb-0 h6 fw-light">Total Students</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="d-flex justify-content-center align-items-center p-4 bg-info bg-opacity-10 rounded-3">
                <span class="display-6 text-info mb-0"><i class="fas fa-gem fa-fw"></i></span>
                <div class="ms-4">
                    <h5 class="mb-0 fw-bold">{{ number_format($totalEnrollments) }}</h5>
                    <span class="mb-0 h6 fw-light">Total Enrollments</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Counter boxes END -->

    <!-- Enrollments overview START -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card card-body bg-transparent border p-4 h-100">
                <div class="row g-4">
                    <div class="col-sm-6 col-md-4">
                        <span class="badge text-bg-dark">This Month</span>
                        <h4 class="text-primary my-2">{{ number_format($enrollmentsThisMonth) }}</h4>
                        <p class="mb-0">New enrollments</p>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <span class="badge text-bg-dark">Last Month</span>
                        <h4 class="my-2">{{ number_format($enrollmentsLastMonth) }}</h4>
                        <p class="mb-0">
                            @if($lastMonthPercent >= 0)
                                <span class="text-success me-1">{{ $lastMonthPercent }}%<i class="bi bi-arrow-up"></i></span>
                            @else
                                <span class="text-danger me-1">{{ abs($lastMonthPercent) }}%<i class="bi bi-arrow-down"></i></span>
                            @endif
                            vs last month
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Enrollments overview END -->

    <!-- My Courses table START -->
    <div class="row">
        <div class="col-12">
            <div class="card border bg-transparent rounded-3 mt-5">
                <div class="card-header bg-transparent border-bottom">
                    <div class="d-sm-flex justify-content-sm-between align-items-center">
                        <h3 class="mb-2 mb-sm-0">My Courses</h3>
                        <a href="{{ route('instructor.manage-course') }}" class="btn btn-sm btn-primary-soft mb-0">My courses</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive border-0 rounded-3">
                        <table class="table table-dark-gray align-middle p-4 mb-0">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-0 rounded-start">Course Name</th>
                                    <th scope="col" class="border-0">Mode</th>
                                    <th scope="col" class="border-0">Enrollments</th>
                                    <th scope="col" class="border-0 rounded-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($courses as $course)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="w-60px">
                                                <img src="{{ $course->image_url }}" class="rounded" alt="{{ $course->name }}">
                                            </div>
                                            <h6 class="mb-0 ms-2 table-responsive-title">{{ $course->name }}</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary bg-opacity-10 text-primary">{{ $course->courseMode?->name ?? '—' }}</span>
                                    </td>
                                    <td>{{ number_format($course->enrollments_count) }}</td>
                                    <td>
                                        <a href="{{ route('instructor.courses.edit', $course) }}" class="btn btn-sm btn-success-soft btn-round me-1" title="Edit"><i class="far fa-fw fa-edit"></i></a>
                                        <a href="{{ route('instructor.exams.index', $course) }}" class="btn btn-sm btn-info-soft btn-round me-1" title="Exams"><i class="bi bi-journal-text"></i></a>
                                        <a href="{{ route('instructor.attendance.index', $course) }}" class="btn btn-sm btn-success-soft btn-round mb-0" title="Attendance"><i class="bi bi-person-check"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-body py-4">You have no courses assigned yet. Courses are assigned by Admin from the course edit page.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if($courses->isNotEmpty())
                    <p class="mb-0 mt-3 small text-body">Showing {{ $courses->count() }} of your courses. <a href="{{ route('instructor.manage-course') }}">Manage courses</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- My Courses table END -->

    <!-- Enrolled Students (Recent Enrollments) START -->
    <div class="row">
        <div class="col-12">
            <div class="card border bg-transparent rounded-3 mt-5">
                <div class="card-header bg-transparent border-bottom">
                    <div class="d-sm-flex justify-content-sm-between align-items-center">
                        <h3 class="mb-2 mb-sm-0">Enrolled Students</h3>
                        <span class="badge bg-primary-soft text-primary">Recent enrollments in your courses</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive border-0 rounded-3">
                        <table class="table table-dark-gray align-middle p-4 mb-0">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-0 rounded-start">Student</th>
                                    <th scope="col" class="border-0">Course</th>
                                    <th scope="col" class="border-0">Enrolled at</th>
                                    <th scope="col" class="border-0 rounded-end">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentEnrollments ?? [] as $enrollment)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-primary bg-opacity-10 text-primary rounded-circle">{{ strtoupper(substr($enrollment->user->name ?? '?', 0, 1)) }}</span>
                                            </div>
                                            <div class="ms-2">
                                                <h6 class="mb-0">{{ $enrollment->user->name ?? $enrollment->user->email }}</h6>
                                                <small class="text-body">{{ $enrollment->user->email }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="fw-medium">{{ $enrollment->course->name ?? '—' }}</span>
                                    </td>
                                    <td>
                                        <span class="text-body">{{ $enrollment->created_at->format('M d, Y H:i') }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success bg-opacity-10 text-success">{{ $enrollment->payment_status ?? 'Enrolled' }}</span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-body py-4">No enrollments yet. When students enroll in your courses, they will appear here.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if(isset($recentEnrollments) && $recentEnrollments->isNotEmpty())
                    <p class="mb-0 mt-3 small text-body">Showing latest {{ $recentEnrollments->count() }} enrollments in your courses.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Enrolled Students END -->
</div>
<!-- Main content END -->
@endsection