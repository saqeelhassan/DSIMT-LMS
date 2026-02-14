@extends('main-website.layouts.main')

@section('title', 'Courses | Digital Sindh Institute')
@section('description', 'Explore our IT courses.')

@section('content')
<!-- Start Courses Area -->
<section class="courses section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <div class="section-icon wow zoomIn" data-wow-delay=".4s">
                        <i class="lni lni-graduation"></i>
                    </div>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Featured Courses</h2>
                    <p class="wow fadeInUp" style="background-color: #012169; color: lightgrey; border-radius: 2px;" data-wow-delay=".6s">Experience a new level of proficiency with our Featured IT Courses <br> Your roadmap to success in the ever-evolving IT landscape.</p>
                </div>
            </div>
        </div>
        <div class="single-head">
            <div class="row">
                @forelse($courses ?? [] as $course)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-course wow fadeInUp" data-wow-delay=".2s">
                        <div class="course-image">
                            <a href="{{ route('courses.detail', $course) }}"><img src="{{ asset($course->image_url) }}" alt="{{ $course->name }}"></a>
                            <a href="{{ route('courses.detail', $course) }}"><p class="price">Check Details</p></a>
                        </div>
                        <div class="content">
                            <h3><a href="{{ route('courses.detail', $course) }}">{{ $course->name }}</a></h3>
                            @auth
                                <a href="{{ route('courses.detail', $course) }}"><button class="btn-sm enroll_now">View & Enroll</button></a>
                            @else
                                <a href="{{ route('login', ['intended' => route('courses.detail', $course), 'enroll_course' => $course->id]) }}"><button class="btn-sm enroll_now">Enroll Now</button></a>
                            @endauth
                        </div>
                        <div class="bottom-content">
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li>{{ $course->enrollments_count ?? 0 }} {{ Str::plural('Enrollment', $course->enrollments_count ?? 0) }}</li>
                            </ul>
                            <span class="tag">
                                <i class="lni lni-tag"></i>
                                <a href="{{ route('courses.detail', $course) }}">{{ $course->courseMode->name ?? 'Course' }}</a>
                            </span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <p class="mb-0">No courses available yet. Check back soon.</p>
                </div>
                @endforelse
            </div>

            @if(isset($courses) && $courses->hasPages())
            <div class="row mt-4">
                <div class="col-12 d-flex justify-content-center">
                    {{ $courses->links() }}
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
<!-- End Courses Area -->
@endsection
