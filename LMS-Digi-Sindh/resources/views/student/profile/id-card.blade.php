@extends('layouts.account', ['account' => 'student'])

@section('content')
<div class="col-xl-9">
    <div class="mb-4 no-print">
        <h1 class="h3 mb-1">Digital ID Card</h1>
        <p class="mb-0 text-body">DSIMT Student ID — View or print.</p>
    </div>

    <div class="card border rounded-3 shadow-sm" id="id-card">
        <div class="card-body d-flex flex-column flex-md-row align-items-center gap-4 p-4">
            <div class="flex-shrink-0">
                @if($user->avatar_url)
                    <img src="{{ $user->avatar_url }}" alt="Photo" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                @else
                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center text-muted" style="width: 100px; height: 100px;">
                        <span class="fs-2">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                    </div>
                @endif
            </div>
            <div class="flex-grow-1">
                <h5 class="mb-1">Digital Sindh Institute of Management &amp; Technology</h5>
                <p class="text-muted small mb-2">Student ID Card</p>
                <p class="mb-1 fw-bold fs-5">{{ $user->name }}</p>
                <p class="mb-1 small">ID: DSIMT-{{ str_pad($user->id, 5, '0', STR_PAD_LEFT) }}</p>
                <p class="mb-1 small">{{ $user->email }}</p>
                <p class="mb-0 small">{{ $user->userDetail->mobile ?? '—' }}</p>
                @if($enrollments->isNotEmpty())
                    <p class="mt-2 mb-0 small text-muted">Courses: {{ $enrollments->pluck('course.name')->join(', ') }}</p>
                @endif
            </div>
        </div>
    </div>

    <div class="mt-3 no-print">
        <button type="button" onclick="window.print();" class="btn btn-primary">Print ID Card</button>
        <a href="{{ route('student.dashboard') }}" class="btn btn-outline-secondary">Back to Dashboard</a>
    </div>
</div>

<style media="print">
    .no-print, nav, .navbar, .sidebar, .btn, .breadcrumb { display: none !important; }
    body { background: #fff; }
    #id-card { box-shadow: none; border: 1px solid #ddd; }
</style>
@endsection
