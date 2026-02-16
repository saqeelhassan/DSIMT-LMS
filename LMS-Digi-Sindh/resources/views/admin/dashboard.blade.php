@extends('layouts.admin')

@section('content')
@if(isset($overdueCount) && ($overdueCount > 0 || ($markedOverdue ?? 0) > 0))
<div class="row mb-4">
    <div class="col-12">
        <div class="alert alert-danger border-0 d-flex align-items-center justify-content-between flex-wrap gap-2 mb-0">
            <div>
                <strong><i class="fas fa-exclamation-triangle me-2"></i>Overdue fee vouchers</strong>
                <span class="ms-2">{{ $overdueCount }} invoice(s) past due date. The overdue check runs automatically when you open this dashboard.</span>
                @if(($markedOverdue ?? 0) > 0)
                    <span class="d-block small mt-1">{{ $markedOverdue }} were just marked overdue.</span>
                @endif
            </div>
            <a href="{{ route('admin.invoices.index', ['status' => 'overdue']) }}" class="btn btn-sm btn-danger">View overdue</a>
        </div>
    </div>
</div>
@endif

<!-- Counter boxes START -->
<div class="row g-4 mb-4">
    <div class="col-md-6 col-xxl-3">
        @if(auth()->user()->role?->name === 'SuperAdmin' || auth()->user()->role?->name === 'Staff' || auth()->user()->hasAdminPermission('courses.manage'))
        <a href="{{ route('admin.courses.index') }}" class="text-decoration-none text-body">
        @endif
            <div class="card card-body bg-warning bg-opacity-15 p-4 h-100 hover-shadow">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-0 fw-bold" style="font-size: calc(1.5rem - 1px);">{{ $totalCourses ?? 0 }}</h2>
                        <span class="mb-0 h6 fw-light">Total Courses</span>
                        <span class="d-block small text-muted mt-1">View all courses</span>
                    </div>
                    <div class="icon-lg rounded-circle bg-warning text-white mb-0"><i class="fas fa-tv fa-fw"></i></div>
                </div>
            </div>
        @if(auth()->user()->role?->name === 'SuperAdmin' || auth()->user()->role?->name === 'Staff' || auth()->user()->hasAdminPermission('courses.manage'))
        </a>
        @endif
    </div>
    <div class="col-md-6 col-xxl-3">
        @if(auth()->user()->role?->name === 'SuperAdmin' || auth()->user()->role?->name === 'Staff' || auth()->user()->hasAdminPermission('enrollments.view'))
        <a href="{{ route('admin.enrollments.index') }}" class="text-decoration-none text-body">
        @endif
            <div class="card card-body bg-purple bg-opacity-10 p-4 h-100 hover-shadow">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-0 fw-bold" style="font-size: calc(1.5rem - 1px);">{{ $totalEnrollments ?? 0 }}</h2>
                        <span class="mb-0 h6 fw-light">Total Enrollments</span>
                        <span class="d-block small text-muted mt-1">View all enrollments</span>
                    </div>
                    <div class="icon-lg rounded-circle bg-purple text-white mb-0"><i class="fas fa-user-tie fa-fw"></i></div>
                </div>
            </div>
        @if(auth()->user()->role?->name === 'SuperAdmin' || auth()->user()->role?->name === 'Staff' || auth()->user()->hasAdminPermission('enrollments.view'))
        </a>
        @endif
    </div>
    <div class="col-md-6 col-xxl-3">
        @if(auth()->user()->role?->name === 'SuperAdmin' || auth()->user()->role?->name === 'Staff' || auth()->user()->hasAdminPermission('users.view'))
        <a href="{{ route('admin.users.index') }}" class="text-decoration-none text-body">
        @endif
            <div class="card card-body bg-primary bg-opacity-10 p-4 h-100 hover-shadow">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-0 fw-bold" style="font-size: calc(1.5rem - 1px);">{{ $totalUsers ?? 0 }}</h2>
                        <span class="mb-0 h6 fw-light">Total Users</span>
                        <span class="d-block small text-muted mt-1">View all users</span>
                    </div>
                    <div class="icon-lg rounded-circle bg-primary text-white mb-0"><i class="fas fa-user-graduate fa-fw"></i></div>
                </div>
            </div>
        @if(auth()->user()->role?->name === 'SuperAdmin' || auth()->user()->role?->name === 'Staff' || auth()->user()->hasAdminPermission('users.view'))
        </a>
        @endif
    </div>
    <div class="col-md-6 col-xxl-3">
        @if(auth()->user()->role?->name === 'SuperAdmin' || auth()->user()->role?->name === 'Staff' || auth()->user()->hasAdminPermission('batches.manage'))
        <a href="{{ route('admin.batches.index') }}" class="text-decoration-none text-body">
        @endif
            <div class="card card-body bg-success bg-opacity-10 p-4 h-100 hover-shadow">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-0 fw-bold" style="font-size: calc(1.5rem - 1px);">{{ $activeBatches ?? 0 }}</h2>
                        <span class="mb-0 h6 fw-light">Active Batches</span>
                        <span class="d-block small text-muted mt-1">View all batches</span>
                    </div>
                    <div class="icon-lg rounded-circle bg-success text-white mb-0"><i class="bi bi-stopwatch-fill fa-fw"></i></div>
                </div>
            </div>
        @if(auth()->user()->role?->name === 'SuperAdmin' || auth()->user()->role?->name === 'Staff' || auth()->user()->hasAdminPermission('batches.manage'))
        </a>
        @endif
    </div>
    <div class="col-12 mt-2">
        <a href="{{ route('admin.invoices.index', ['status' => 'overdue']) }}" class="text-decoration-none">
            <div class="card card-body {{ ($overdueCount ?? 0) > 0 ? 'bg-danger bg-opacity-15 border-danger' : 'bg-light border' }} p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-0 fw-bold" style="font-size: calc(1.5rem - 1px);">{{ $overdueCount ?? 0 }}</h2>
                        <span class="mb-0 h6 fw-light">Overdue invoices</span>
                        <span class="d-block small text-body-secondary mt-1">Fee vouchers past due. Click to view or use Defaulter List in the menu.</span>
                    </div>
                    <div class="icon-lg rounded-circle {{ ($overdueCount ?? 0) > 0 ? 'bg-danger' : 'bg-secondary' }} text-white mb-0"><i class="fas fa-exclamation-triangle fa-fw"></i></div>
                </div>
            </div>
        </a>
    </div>
    @if(isset($attendanceOverview) && (auth()->user()->role?->name === 'SuperAdmin' || auth()->user()->role?->name === 'Staff' || auth()->user()->hasAdminPermission('batches.manage')))
    <div class="col-12 mt-2">
        <a href="{{ route('admin.attendance.index') }}" class="text-decoration-none">
            <div class="card card-body bg-light border p-4">
                <h6 class="mb-2"><i class="bi bi-calendar-check me-2"></i>Today's attendance</h6>
                <div class="row g-2 small">
                    <div class="col-md-6">
                        <span class="text-body">Students:</span>
                        <strong>{{ $attendanceOverview['student_present_count'] ?? 0 }}/{{ $attendanceOverview['student_expected_count'] ?? 0 }}</strong>
                        <span class="text-success">({{ $attendanceOverview['student_present_percent'] ?? 0 }}% present)</span>
                    </div>
                    <div class="col-md-6">
                        <span class="text-body">Instructors:</span>
                        <strong>{{ $attendanceOverview['instructor_present_count'] ?? 0 }}</strong> present,
                        <strong class="text-danger">{{ $attendanceOverview['instructor_absent_count'] ?? 0 }}</strong> absent
                    </div>
                </div>
                <span class="d-block small text-body-secondary mt-1">Click to correct times or download payroll report.</span>
            </div>
        </a>
    </div>
    @endif
</div>
<!-- Counter boxes END -->

<!-- Earnings chart + Recent activity START -->
<div class="row g-4 mb-4">
    <div class="col-xxl-8">
        <div class="card shadow h-100">
            <div class="card-header p-4 border-bottom">
                <h5 class="card-header-title mb-0">Earnings</h5>
                <span class="text-body small">Monthly revenue from payments (last 12 months)</span>
            </div>
            <div class="card-body">
                <div id="ChartEarnings" style="min-height: 280px;"></div>
            </div>
        </div>
    </div>
    <div class="col-xxl-4">
        <div class="card shadow h-100">
            <div class="card-header border-bottom p-4">
                <h5 class="card-header-title mb-0">Recent activity</h5>
            </div>
            <div class="card-body p-4">
                @php $recentForCard = collect($recentActivity ?? [])->take(5); @endphp
                @forelse($recentForCard as $notif)
                    <div class="d-flex justify-content-between position-relative mb-3">
                        <div class="d-sm-flex">
                            <div class="avatar avatar-md flex-shrink-0 rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center">
                                <i class="bi bi-journal-plus"></i>
                            </div>
                            <div class="ms-2 mt-2 mt-sm-0">
                                <h6 class="mb-0">{{ $notif['title'] ?? 'Activity' }}</h6>
                                <p class="mb-0 small">{{ $notif['message'] ?? '' }}</p>
                                <span class="small">{{ $notif['time'] ?? '' }}</span>
                            </div>
                        </div>
                    </div>
                    @if(!$loop->last)<hr class="my-2">@endif
                @empty
                    <p class="mb-0 text-body">No recent activity.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
<!-- Earnings chart + Recent activity END -->

<!-- Traffic Sources START -->
<div class="row g-4 mb-4">
    <div class="col-12">
        <div class="card shadow h-100">
            <div class="card-header border-bottom d-flex justify-content-between align-items-center p-4">
                <h5 class="card-header-title mb-0">Traffic Sources</h5>
                <span class="text-body small">Top courses by enrollment</span>
            </div>
            <div class="card-body p-4">
                <div id="ChartTrafficSources" style="min-height: 260px;"></div>
                @if(!empty($trafficSources))
                <ul class="list-group list-group-borderless mt-3">
                    @foreach($trafficSources as $idx => $src)
                    <li class="list-group-item d-flex justify-content-between">
                        <span class="text-truncate me-2"><i class="fas fa-circle me-2" style="color: var(--bs-{{ ['primary','success','warning','danger','info','secondary'][$idx % 6] }})"></i>{{ Str::limit($src['name'], 40) }}</span>
                        <span class="fw-semibold">{{ $src['count'] }} enrol.</span>
                    </li>
                    @endforeach
                </ul>
                @else
                <p class="mb-0 text-body mt-2">No enrollment data yet.</p>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Traffic Sources END -->
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Earnings chart (line) - monthly revenue
    var earningsOptions = {
        chart: { type: 'area', height: 280, toolbar: { show: false } },
        series: [{ name: 'Revenue', data: @json($earningsValues ?? []) }],
        xaxis: { categories: @json($earningsLabels ?? []) },
        dataLabels: { enabled: false },
        stroke: { curve: 'smooth', width: 2 },
        fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.4, opacityTo: 0.1 } },
        colors: ['#435ebe'],
        tooltip: { y: { formatter: function(v) { return v ? (parseFloat(v).toFixed(2) + '') : '0'; } } }
    };
    var earningsEl = document.getElementById('ChartEarnings');
    if (earningsEl) new ApexCharts(earningsEl, earningsOptions).render();

    // Traffic Sources chart (donut) - top courses by enrollment
    var trafficData = @json($trafficSources ?? []);
    if (trafficData.length > 0) {
        var trafficOptions = {
            chart: { type: 'donut', height: 260 },
            series: trafficData.map(function(s) { return s.count; }),
            labels: trafficData.map(function(s) { return s.name.length > 25 ? s.name.substring(0, 25) + '...' : s.name; }),
            colors: ['#435ebe', '#198754', '#ffc107', '#dc3545', '#0dcaf0', '#6c757d'],
            legend: { position: 'bottom', fontSize: '12px' },
            plotOptions: { pie: { donut: { size: '60%' } } },
            dataLabels: { formatter: function(v, opts) { return opts.w.config.series[opts.seriesIndex] + ' (' + v.toFixed(0) + '%)'; } }
        };
        var trafficEl = document.getElementById('ChartTrafficSources');
        if (trafficEl) new ApexCharts(trafficEl, trafficOptions).render();
    }
});
</script>
@endsection