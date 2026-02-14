{{-- Course card partial - expects $course (App\Models\Course) --}}
<div class="col-sm-6 col-lg-3">
    <div class="card shadow h-100">
        <img src="{{ $course->image_url }}" class="card-img-top" alt="{{ $course->name }}">
        <div class="card-body pb-0">
            <div class="d-flex justify-content-between mb-2">
                <a href="{{ route('courses.detail', $course) }}" class="badge bg-purple bg-opacity-10 text-purple">{{ $course->courseMode?->name ?? '—' }}</a>
                <a href="#" class="h6 fw-light mb-0"><i class="far fa-heart"></i></a>
            </div>
            <h5 class="card-title">
                <a href="{{ route('courses.detail', $course) }}">{{ $course->name }}</a>
            </h5>
            <p class="mb-2 text-truncate-2">{{ Str::limit($course->description, 80) ?: 'No description.' }}</p>
            <ul class="list-inline mb-0">
                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                <li class="list-inline-item me-0 small"><i class="far fa-star text-warning"></i></li>
                <li class="list-inline-item ms-2 h6 fw-light mb-0">{{ $course->enrollments_count ?? 0 }} enrolled</li>
            </ul>
        </div>
        <div class="card-footer pt-0 pb-3">
            <hr>
            <div class="d-flex justify-content-between">
                <span class="h6 fw-light mb-0"><i class="fas fa-signal text-success me-2"></i>{{ $course->courseMode?->name ?? '—' }}</span>
                <a href="{{ route('courses.detail', $course) }}" class="btn btn-sm btn-primary-soft mb-0">View</a>
            </div>
        </div>
    </div>
</div>
