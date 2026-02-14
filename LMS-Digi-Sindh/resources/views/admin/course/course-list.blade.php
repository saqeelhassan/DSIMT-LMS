@extends('layouts.admin')

@section('content')
<!-- Title -->
<div class="row mb-3">
    <div class="col-12 d-sm-flex justify-content-between align-items-center">
        <h1 class="h3 mb-2 mb-sm-0">Courses</h1>
        @if(auth()->user()->role?->name === 'SuperAdmin' || auth()->user()->hasAdminPermission('courses.create'))
        <a href="{{ route('admin.courses.create') }}" class="btn btn-sm btn-primary mb-0">Add course</a>
        @endif
    </div>
</div>

<!-- Course boxes START -->
<div class="row g-4 mb-4">
    <div class="col-sm-6 col-lg-4">
        <div class="text-center p-4 bg-primary bg-opacity-10 border border-primary rounded-3">
            <h6>Total Courses</h6>
            <h2 class="mb-0 fs-1 text-primary">{{ $totalCourses ?? 0 }}</h2>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="text-center p-4 bg-success bg-opacity-10 border border-success rounded-3">
            <h6>Showing</h6>
            <h2 class="mb-0 fs-1 text-success">{{ $courses->count() }}</h2>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="text-center p-4 bg-warning bg-opacity-15 border border-warning rounded-3">
            <h6>This Page</h6>
            <h2 class="mb-0 fs-1 text-warning">{{ $courses->currentPage() }}</h2>
        </div>
    </div>
</div>
<!-- Course boxes END -->

<!-- Card START -->
<div class="card bg-transparent border">

    <!-- Card header START -->
    <div class="card-header bg-light border-bottom">
        <!-- Search and select START -->
        <div class="row g-3 align-items-center justify-content-between">
            <!-- Search bar -->
            <div class="col-md-8">
                <form class="rounded position-relative" method="get" action="{{ route('admin.courses.index') }}">
                    <input class="form-control bg-body" type="search" name="q" placeholder="Search" aria-label="Search" value="{{ request('q') }}">
                    <button class="bg-transparent p-2 position-absolute top-50 end-0 translate-middle-y border-0 text-primary-hover text-reset" type="submit">
                        <i class="fas fa-search fs-6 "></i>
                    </button>
                </form>
            </div>

            <!-- Select option -->
            <div class="col-md-3">
                <!-- Short by filter -->
                <form>
                    <select class="form-select js-choice border-0 z-index-9" aria-label=".form-select-sm">
                        <option value="">Sort by</option>
                        <option>Newest</option>
                        <option>Oldest</option>
                        <option>Accepted</option>
                        <option>Rejected</option>
                    </select>
                </form>
            </div>
        </div>
        <!-- Search and select END -->
    </div>
    <!-- Card header END -->

    <!-- Card body START -->
    <div class="card-body">
        <!-- Course table START -->
        <div class="table-responsive border-0 rounded-3">
            <!-- Table START -->
            <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                <!-- Table head -->
                <thead>
                    <tr>
                        <th scope="col" class="border-0 rounded-start">Course Name</th>
                        <th scope="col" class="border-0">Instructor</th>
                        <th scope="col" class="border-0">Added Date</th>
                        <th scope="col" class="border-0">Type</th>
                        <th scope="col" class="border-0">Price</th>
                        <th scope="col" class="border-0">Status</th>
                        <th scope="col" class="border-0 rounded-end">Action</th>
                    </tr>
                </thead>

                <!-- Table body START -->
                <tbody>
                    @forelse($courses as $course)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center position-relative">
                                <div class="w-60px">
                                    <img src="{{ $course->image_url }}" class="rounded" alt="">
                                </div>
                                <h6 class="table-responsive-title mb-0 ms-2">
                                    <a href="{{ route('admin.courses.show', $course) }}" class="stretched-link">{{ $course->name }}</a>
                                </h6>
                            </div>
                        </td>
                        <td><span class="text-muted">—</span></td>
                        <td>{{ $course->created_at?->format('d M Y') }}</td>
                        <td><span class="badge text-bg-primary">{{ $course->courseMode?->name ?? '—' }}</span></td>
                        <td><span class="text-muted">—</span></td>
                        <td><span class="badge bg-success bg-opacity-15 text-success">Live</span></td>
                        <td>
                            @if(auth()->user()->role?->name === 'SuperAdmin' || auth()->user()->hasAdminPermission('courses.create'))
                            <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-sm btn-primary me-1 mb-1 mb-md-0">Edit</a>
                            @endif
                            <a href="{{ route('admin.courses.show', $course) }}" class="btn btn-sm btn-dark me-1 mb-1 mb-md-0">View</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">No courses found.</td>
                    </tr>
                    @endforelse
                </tbody>
                <!-- Table body END -->
            </table>
            <!-- Table END -->
        </div>
        <!-- Course table END -->
    </div>
    <!-- Card body END -->

    <!-- Card footer START -->
    <div class="card-footer bg-transparent pt-0">
        <!-- Pagination START -->
        <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
            <!-- Content -->
            <p class="mb-0 text-center text-sm-start">Showing {{ $courses->firstItem() ?? 0 }} to {{ $courses->lastItem() ?? 0 }} of {{ $courses->total() }} entries</p>
            <!-- Pagination -->
            <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
                {{ $courses->links() }}
            </nav>
        </div>
        <!-- Pagination END -->
    </div>
    <!-- Card footer END -->
</div>
<!-- Card END -->
@endsection