@extends('layouts.account', ['account' => 'student'])

@section('content')
<div class="col-xl-9">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
        <div>
            <h1 class="h3 mb-1">My attendance</h1>
            <p class="mb-0 text-body">Calendar view and overall percentage.</p>
        </div>
        <nav class="d-flex align-items-center gap-2">
            <a href="{{ route('student.attendance.index', ['month' => $prevMonth]) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-chevron-left"></i></a>
            <span class="fw-medium">{{ $start->format('F Y') }}</span>
            <a href="{{ route('student.attendance.index', ['month' => $nextMonth]) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-chevron-right"></i></a>
        </nav>
    </div>

    <div class="card border rounded-3 mb-4">
        <div class="card-body">
            <h5 class="card-title mb-3">Your attendance: <span class="{{ $percentLow ? 'text-danger fw-bold' : 'text-success' }}">{{ $percent }}%</span></h5>
            <div class="progress rounded-pill" style="height: 1.5rem;">
                <div class="progress-bar {{ $percentLow ? 'bg-danger' : 'bg-success' }}" role="progressbar" style="width: {{ min($percent, 100) }}%;" aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100">{{ $percent }}%</div>
            </div>
            @if($percentLow && $total > 0)
            <p class="small text-danger mb-0 mt-2">Attendance is below 75%. Please improve to meet institute requirements.</p>
            @endif
            <p class="small text-body-secondary mb-0 mt-1">{{ $present }} present out of {{ $total }} session(s) this month.</p>
        </div>
    </div>

    <div class="card border rounded-3">
        <div class="card-header bg-light">
            <h5 class="mb-0">Calendar — {{ $start->format('F Y') }}</h5>
        </div>
        <div class="card-body p-3 p-md-4">
            <div class="attendance-calendar">
                <div class="row g-1 mb-2 text-center small fw-medium text-body-secondary">
                    <div class="col">Sun</div>
                    <div class="col">Mon</div>
                    <div class="col">Tue</div>
                    <div class="col">Wed</div>
                    <div class="col">Thu</div>
                    <div class="col">Fri</div>
                    <div class="col">Sat</div>
                </div>
                @php
                    $firstDay = $start->copy()->startOfMonth();
                    $lastDay = $start->copy()->endOfMonth();
                    $startWeekday = (int) $firstDay->format('w');
                    $daysInMonth = $lastDay->day;
                    $weeks = [];
                    $day = 1;
                    $week = array_fill(0, 7, null);
                    for ($i = 0; $i < $startWeekday; $i++) {
                        $week[$i] = '';
                    }
                    for ($d = 1; $d <= $daysInMonth; $d++) {
                        $week[$startWeekday] = $d;
                        $startWeekday++;
                        if ($startWeekday >= 7) {
                            $weeks[] = $week;
                            $week = array_fill(0, 7, null);
                            $startWeekday = 0;
                        }
                    }
                    if ($startWeekday > 0) {
                        $weeks[] = $week;
                    }
                @endphp
                @foreach($weeks as $week)
                <div class="row g-1 mb-1">
                    @foreach($week as $d)
                    @php
                        $dateStr = $d ? $start->format('Y-m') . '-' . str_pad((string)$d, 2, '0', STR_PAD_LEFT) : '';
                        $status = $dateStr && isset($calendar[$dateStr]) ? $calendar[$dateStr] : null;
                        $cls = '';
                        if ($status === 'Present') $cls = 'bg-success text-white';
                        elseif ($status === 'Absent') $cls = 'bg-danger text-white';
                        elseif ($status === 'Leave') $cls = 'bg-warning text-dark';
                        elseif ($status === 'Late') $cls = 'bg-secondary text-white';
                    @endphp
                    <div class="col text-center p-1">
                        @if($d)
                        <span class="d-inline-block rounded-circle d-flex align-items-center justify-content-center mx-auto {{ $cls }}" style="width:2rem; height:2rem; font-size:0.85rem;" title="{{ $dateStr }}{{ $status ? ': ' . $status : '' }}">{{ $d }}</span>
                        @else
                        <span class="d-inline-block" style="width:2rem; height:2rem;"></span>
                        @endif
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
            <div class="d-flex flex-wrap gap-3 mt-3 pt-3 border-top small">
                <span><span class="d-inline-block rounded-circle bg-success text-white me-1" style="width:1rem;height:1rem;"></span> Present</span>
                <span><span class="d-inline-block rounded-circle bg-danger text-white me-1" style="width:1rem;height:1rem;"></span> Absent</span>
                <span><span class="d-inline-block rounded-circle bg-warning text-dark me-1" style="width:1rem;height:1rem;"></span> Leave</span>
                <span><span class="d-inline-block rounded-circle bg-secondary text-white me-1" style="width:1rem;height:1rem;"></span> Late</span>
            </div>
        </div>
    </div>
</div>
@endsection
