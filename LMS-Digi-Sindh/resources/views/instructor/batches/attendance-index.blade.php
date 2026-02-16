@extends('layouts.account', ['account' => 'instructor'])

@section('content')
<div class="col-xl-9">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <a href="{{ route('instructor.batches.index') }}" class="text-body small d-block mb-1"><i class="bi bi-arrow-left me-1"></i>My Batches</a>
            <h1 class="h3 mb-1">Attendance: {{ $batch->name }}</h1>
            <p class="mb-0 text-body">{{ $batch->course->name ?? '—' }} — Take or view attendance by date.</p>
        </div>
        <a href="{{ route('instructor.batches.attendance.take', $batch) }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i>Take attendance</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border rounded-3 mb-4">
        <div class="card-body py-3">
            <h6 class="mb-2"><i class="bi bi-qr-code me-2"></i>QR attendance (Physical)</h6>
            <p class="small text-body mb-2">Share this link or display as QR so students can scan and mark themselves Present (GPS verified if enabled). Link valid 24 hours.</p>
            @php
                $qrUrl = \Illuminate\Support\Facades\URL::temporarySignedRoute('student.attendance.qr', now()->addDay(), ['batch' => $batch]);
            @endphp
            <div class="input-group input-group-sm">
                <input type="text" class="form-control font-monospace" id="qr-link-{{ $batch->id }}" value="{{ $qrUrl }}" readonly>
                <button type="button" class="btn btn-outline-secondary" onclick="navigator.clipboard.writeText(document.getElementById('qr-link-{{ $batch->id }}').value); this.textContent='Copied!'; setTimeout(function(){ this.textContent='Copy'; }.bind(this), 1500);">Copy</button>
            </div>
        </div>
    </div>

    <div class="card border rounded-3">
        <div class="card-header bg-light">
            <h5 class="mb-0">Recent attendance sessions</h5>
        </div>
        <div class="card-body">
            @if($dates->isNotEmpty())
                <div class="list-group list-group-flush">
                    @foreach($dates as $d)
                    <a href="{{ route('instructor.batches.attendance.view', [$batch, $d]) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-calendar3 me-2"></i>{{ \Carbon\Carbon::parse($d)->format('l, M d, Y') }}</span>
                        <i class="bi bi-chevron-right"></i>
                    </a>
                    @endforeach
                </div>
            @else
                <p class="mb-0 text-body">No attendance recorded yet. <a href="{{ route('instructor.batches.attendance.take', $batch) }}">Take attendance</a> for today.</p>
            @endif
        </div>
    </div>
</div>
@endsection
