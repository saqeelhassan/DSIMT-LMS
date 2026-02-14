@extends('layouts.account', ['account' => 'student'])

@section('content')
<!-- Main content START -->
<div class="col-xl-9">
    <div class="card bg-transparent border rounded-3">
        <!-- Card header START -->
        <div class="card-header bg-transparent border-bottom">
            <h3 class="mb-0">My Courses List</h3>
        </div>
        <!-- Card header END -->

        <!-- Card body START -->
        <div class="card-body">

            <!-- Search and select START -->
            <div class="row g-3 align-items-center justify-content-between mb-4">
                <!-- Content -->
                <div class="col-md-8">
                    <form class="rounded position-relative">
                        <input class="form-control pe-5 bg-transparent" type="search" placeholder="Search"
                            aria-label="Search">
                        <button
                            class="bg-transparent p-2 position-absolute top-50 end-0 translate-middle-y border-0 text-primary-hover text-reset"
                            type="submit">
                            <i class="fas fa-search fs-6 "></i>
                        </button>
                    </form>
                </div>

                <!-- Select option -->
                <div class="col-md-3">
                    <!-- Short by filter -->
                    <form>
                        <select class="form-select js-choice border-0 z-index-9 bg-transparent"
                            aria-label=".form-select-sm">
                            <option value="">Sort by</option>
                            <option>Free</option>
                            <option>Newest</option>
                            <option>Most popular</option>
                            <option>Most Viewed</option>
                        </select>
                    </form>
                </div>
            </div>
            <!-- Search and select END -->

            <!-- Course list table START -->
            <div class="table-responsive border-0">
                <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                    <!-- Table head -->
                    <thead>
                        <tr>
                            <th scope="col" class="border-0 rounded-start">Course Title</th>
                            <th scope="col" class="border-0">Total Lectures</th>
                            <th scope="col" class="border-0">Completed Lecture</th>
                            <th scope="col" class="border-0 rounded-end">Action</th>
                        </tr>
                    </thead>

                    <!-- Table body START -->
                    <tbody>
                        @forelse($enrollments as $enrollment)
                        @php $course = $enrollment->course; @endphp
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="w-100px">
                                        <img src="{{ $course->image_url ?? '/images/courses/4by3/08.jpg' }}" class="rounded" alt="">
                                    </div>
                                    <div class="mb-0 ms-2">
                                        <h6 class="table-responsive-title"><a href="{{ route('courses.detail', $course) }}">{{ $course->name }}</a></h6>
                                        <div class="overflow-hidden">
                                            <h6 class="mb-0 text-end">{{ $enrollment->payment_status ?? '—' }}</h6>
                                            <div class="progress progress-sm bg-primary bg-opacity-10">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>—</td>
                            <td>—</td>
                            <td>
                                <a href="{{ route('courses.detail', $course) }}" class="btn btn-sm btn-primary-soft me-1 mb-1 mb-md-0"><i class="bi bi-play-circle me-1"></i>View</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">No enrolled courses. <a href="{{ route('courses.index') }}">Browse courses</a></td>
                        </tr>
                        @endforelse

                        <!-- Table item -->
                        <tr>
            <!-- Course list table END -->

            <!-- Pagination START -->
            <div class="d-sm-flex justify-content-sm-between align-items-sm-center mt-4 mt-sm-3">
                <!-- Content -->
                <p class="mb-0 text-center text-sm-start">Showing {{ $enrollments->firstItem() ?? 0 }} to {{ $enrollments->lastItem() ?? 0 }} of {{ $enrollments->total() }} entries</p>
                <!-- Pagination -->
                @if($enrollments->hasPages())
                <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
                    {{ $enrollments->links() }}
                </nav>
                @endif
            </div>
            <!-- Pagination END -->
        </div>
        <!-- Card body START -->
    </div>
</div>
<!-- Main content END -->
@endsection