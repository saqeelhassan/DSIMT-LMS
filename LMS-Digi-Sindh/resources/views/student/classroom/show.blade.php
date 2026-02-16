@extends('layouts.account', ['account' => 'student'])

@section('content')
<div class="col-xl-9">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
        <div>
            <a href="{{ route('student.dashboard') }}" class="text-body small d-block mb-1">Back to Dashboard</a>
            <h1 class="h3 mb-1">{{ $course->name }}</h1>
            <p class="mb-0 text-body">Watch lectures, download notes, join live class.</p>
        </div>
        @if($course->live_class_url)
            @if(isset($primaryBatch) && $primaryBatch)
                <a href="{{ route('student.live-join', $primaryBatch) }}" target="_blank" class="btn btn-danger"><i class="bi bi-camera-video me-1"></i>Join Live Class</a>
                <small class="d-block text-body-secondary mt-1">Attendance is recorded; stay 15+ min to be marked Present.</small>
            @else
                <a href="{{ $course->live_class_url }}" target="_blank" class="btn btn-danger"><i class="bi bi-camera-video me-1"></i>Join Live Class</a>
            @endif
        @endif
    </div>

    <div class="card border rounded-3 mb-4">
        <div class="card-header bg-light">
            <h5 class="mb-0">Recorded lectures & resources</h5>
        </div>
        <div class="card-body">
            @forelse($course->contents as $c)
            @php $progress = $progressMap->get($c->id); @endphp
            <div class="d-flex justify-content-between align-items-center border-bottom py-3">
                <div class="d-flex align-items-center">
                    @if($c->type === 'video')
                        <span class="btn btn-sm btn-success btn-round me-2"><i class="bi bi-play-fill"></i></span>
                    @elseif($c->type === 'pdf')
                        <span class="btn btn-sm btn-danger btn-round me-2"><i class="bi bi-file-pdf"></i></span>
                    @else
                        <span class="btn btn-sm btn-dark btn-round me-2"><i class="bi bi-code-slash"></i></span>
                    @endif
                    <div>
                        <h6 class="mb-0">{{ $c->title }}</h6>
                        <small class="text-muted">{{ ucfirst($c->type) }}</small>
                        @if($progress && $progress->completed)
                            <span class="badge bg-success ms-2">Done</span>
                        @endif
                    </div>
                </div>
                <div>
                    @if($c->url)
                        <a href="{{ $c->url }}" target="_blank" class="btn btn-sm btn-outline-primary me-1">Watch / Open</a>
                    @endif
                    @if($c->file_path)
                        <a href="{{ asset('storage/' . $c->file_path) }}" target="_blank" download class="btn btn-sm btn-outline-secondary">Download</a>
                    @endif
                </div>
            </div>
            @empty
            <p class="mb-0 text-body">No content added yet. Check back later.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
