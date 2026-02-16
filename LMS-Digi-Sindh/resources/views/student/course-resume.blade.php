@extends('layouts.account', ['account' => 'student'])

@section('content')
<div class="col-xl-9">
    <div class="mb-4">
        <h1 class="h3 mb-1">Course Resume</h1>
        <p class="mb-0 text-body">Your enrolled courses and progress. Continue from where you left off.</p>
    </div>

    @forelse($coursesWithProgress as $item)
    @php
        $course = $item->course;
        $contents = $item->contents;
    @endphp
    <div class="card border rounded-3 mb-4">
        <div class="card-header border-bottom bg-light">
            <div class="row g-0 align-items-center">
                <div class="col-md-3">
                    <img src="{{ $course->image_url }}" class="rounded-2 w-100" alt="{{ $course->name }}" style="max-height: 140px; object-fit: cover;">
                </div>
                <div class="col-md-9">
                    <div class="card-body py-2 py-md-3">
                        <h3 class="h5 card-title mb-2">
                            <a href="{{ route('student.classroom.show', $course) }}" class="text-body">{{ $course->name }}</a>
                        </h3>
                        <ul class="list-inline mb-2 text-muted small">
                            @if($course->total_lectures)
                                <li class="list-inline-item"><i class="bi bi-collection me-1"></i>{{ $course->total_lectures }} lectures</li>
                            @endif
                            @if($course->total_hours)
                                <li class="list-inline-item"><i class="bi bi-clock me-1"></i>{{ $course->total_hours }}h</li>
                            @endif
                            @if($course->courseMode)
                                <li class="list-inline-item"><i class="bi bi-signal me-1"></i>{{ $course->courseMode->name }}</li>
                            @endif
                        </ul>
                        <a href="{{ route('student.classroom.show', $course) }}" class="btn btn-primary btn-sm">Resume course <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <h5 class="mb-3">Course curriculum</h5>

            @if($contents->isEmpty())
                <p class="mb-0 text-body">No content added yet. Check back later.</p>
            @else
                <div class="overflow-hidden mb-3">
                    <div class="d-flex justify-content-between small">
                        <span>{{ $item->completed }}/{{ $item->total }} completed</span>
                        <span>{{ $item->percent }}%</span>
                    </div>
                    <div class="progress progress-sm bg-primary bg-opacity-10">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $item->percent }}%" aria-valuenow="{{ $item->percent }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="vstack gap-2">
                    @foreach($contents as $c)
                    @php $progress = $progressByContent->get($c->id); @endphp
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                        <div class="d-flex align-items-center flex-grow-1 min-w-0">
                            @if($progress && $progress->completed)
                                <span class="btn btn-sm btn-success btn-round me-2 flex-shrink-0"><i class="bi bi-check-lg"></i></span>
                            @else
                                <span class="btn btn-sm btn-outline-secondary btn-round me-2 flex-shrink-0"><i class="bi bi-play-fill"></i></span>
                            @endif
                            <div class="min-w-0">
                                <span class="d-block text-truncate">{{ $c->title }}</span>
                                <small class="text-muted">{{ ucfirst($c->type ?? 'content') }}</small>
                                @if($progress && $progress->completed)
                                    <span class="badge bg-success ms-1">Done</span>
                                @endif
                            </div>
                        </div>
                        <a href="{{ route('student.classroom.show', $course) }}" class="btn btn-sm btn-outline-primary flex-shrink-0 ms-2">Open</a>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    @empty
    <div class="card border rounded-3">
        <div class="card-body text-center py-5">
            <span class="display-4 text-muted"><i class="bi bi-journal-bookmark"></i></span>
            <h5 class="mt-3">No courses yet</h5>
            <p class="text-body mb-0">You are not enrolled in any course. Browse courses and enroll to start learning.</p>
            <a href="{{ route('student.courses') }}" class="btn btn-primary mt-3">My courses</a>
        </div>
    </div>
    @endforelse
</div>
@endsection
