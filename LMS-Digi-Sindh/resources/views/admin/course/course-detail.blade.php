@extends('layouts.admin')

@section('content')
<!-- Title -->
<div class="row mb-3">
    <div class="col-12 d-sm-flex justify-content-between align-items-center">
        <h1 class="h3 mb-2 mb-sm-0">Course Details</h1>
        @if(auth()->user()->role?->name === 'SuperAdmin' || auth()->user()->hasAdminPermission('courses.create'))
        <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-sm btn-primary mb-0">Edit Course</a>
        @endif
    </div>
</div>

<div class="row g-4">

    <!-- Course information START -->
    <div class="col-xxl-6">
        <div class="card bg-transparent border rounded-3 h-100">

            <!-- Catd header -->
            <div class="card-header bg-light border-bottom">
                <h5 class="card-header-title">{{ $course->name }}</h5>
            </div>

            <!-- Card body START -->
            <div class="card-body">

                <!-- Course image and info START -->
                <div class="row g-4">
                    <div class="col-md-6">
                        <img src="{{ $course->image_url }}" class="rounded" alt="{{ $course->name }}">
                    </div>
                    <div class="col-md-6">
                        <p class="mb-3">{{ $course->description ?? 'No description.' }}</p>
                        <p class="mb-3"><span class="badge bg-primary">{{ $course->courseMode?->name ?? '—' }}</span> &middot; {{ $course->enrollments_count ?? 0 }} enrollments</p>

                        <!-- Avatar -->
                        @if($course->instructor)
                        <div class="d-sm-flex align-items-center">
                            <div class="avatar avatar-md">
                                <img class="avatar-img rounded-circle" src="/images/avatar/05.jpg" alt="{{ $course->instructor->name }}">
                            </div>
                            <div class="ms-sm-3 mt-2 mt-sm-0">
                                <h6 class="mb-0">By {{ $course->instructor->name }}</h6>
                                <p class="mb-0 small">{{ $course->instructor->email }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <!-- Course image and info END -->

                <!-- Information START -->
                <div class="row mt-3">

                    <!-- Information item -->
                    <div class="col-md-6">
                        <ul class="list-group list-group-borderless">
                            <li class="list-group-item">
                                <span>release date:</span>
                                <span class="h6 mb-0">{{ $course->release_date ? $course->release_date->format('d M Y') : '—' }}</span>
                            </li>

                            <li class="list-group-item">
                                <span>Total Hour:</span>
                                <span class="h6 mb-0">{{ $course->total_hours ?? '—' }}</span>
                            </li>

                            <li class="list-group-item">
                                <span>Total Enrolled:</span>
                                <span class="h6 mb-0">{{ number_format($course->enrollments_count ?? 0) }}</span>
                            </li>

                            <li class="list-group-item">
                                <span>Certificate:</span>
                                <span class="h6 mb-0">{{ $course->certificate ? 'Yes' : 'No' }}</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Information item -->
                    <div class="col-md-6">
                        <ul class="list-group list-group-borderless">
                            <li class="list-group-item">
                                <span>Skills:</span>
                                <span class="h6 mb-0">{{ $course->skills ?? '—' }}</span>
                            </li>

                            <li class="list-group-item">
                                <span>Total Lecture:</span>
                                <span class="h6 mb-0">{{ $course->total_lectures ?? '—' }}</span>
                            </li>

                            <li class="list-group-item">
                                <span>Language:</span>
                                <span class="h6 mb-0">{{ $course->language ?? '—' }}</span>
                            </li>

                            <li class="list-group-item">
                                <span>Review:</span>
                                <span class="h6 mb-0">—</span>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- Information END -->
            </div>
            <!-- Card body END -->
        </div>
    </div>
    <!-- Course information END -->

    <!-- Chart START -->
    <div class="col-xxl-6">
        <div class="row g-4">

            <!-- Active student START -->
            <div class="col-md-6 col-xxl-12">
                <div class="card bg-transparent border overflow-hidden">
                    <!-- Card header -->
                    <div class="card-header bg-light border-bottom">
                        <h5 class="card-header-title mb-0">Total course earning</h5>
                    </div>
                    <!-- Card body -->
                    <div class="card-body p-0">
                        <div class="d-sm-flex justify-content-between p-4">
                            <h4 class="text-blue mb-0">$12,586</h4>
                            <p class="mb-0"><span class="text-success me-1">0.20%<i
                                        class="bi bi-arrow-up"></i></span>vs last Week</p>
                        </div>
                        <!-- Apex chart -->
                        <div id="activeChartstudent"></div>
                    </div>
                </div>
            </div>
            <!-- Active student END -->

            <!-- Enrolled START -->
            <div class="col-md-6 col-xxl-12">
                <div class="card bg-transparent border overflow-hidden">
                    <!-- Card header -->
                    <div class="card-header bg-light border-bottom">
                        <h5 class="card-header-title mb-0">New Enrollment This Month</h5>
                    </div>
                    <!-- Card body -->
                    <div class="card-body p-0">
                        <div class="d-sm-flex justify-content-between p-4">
                            <h4 class="text-blue mb-0">186</h4>
                            <p class="mb-0"><span class="text-success me-1">0.35%<i
                                        class="bi bi-arrow-up"></i></span>vs last Week</p>
                        </div>
                        <!-- Apex chart -->
                        <div id="activeChartstudent2"></div>
                    </div>
                </div>
            </div>
            <!-- Enrolled END -->

        </div>
    </div>
    <!-- Chart END -->

    <!-- Student review START -->
    <div class="col-12">
        <div class="card bg-transparent border">

            <!-- Card header START -->
            <div class="card-header bg-light border-bottom">
                <h5 class="mb-0">Students all Reviews</h5>
            </div>
            <!-- Card header END -->

            <!-- Card body START -->
            <div class="card-body pb-0">
                <!-- Table START -->
                <div class="table-responsive border-0">
                    <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                        <!-- Table head -->
                        <thead>
                            <tr>
                                <th scope="col" class="border-0 rounded-start">Student Name</th>
                                <th scope="col" class="border-0">Date</th>
                                <th scope="col" class="border-0">Rating</th>
                                <th scope="col" class="border-0 rounded-end">Action</th>
                            </tr>
                        </thead>

                        <!-- Table body START -->
                        <tbody>
                            <!-- Table row -->
                            <tr>
                                <!-- Table data -->
                                <td>
                                    <div class="d-flex align-items-center position-relative">
                                        <!-- Image -->
                                        <div class="avatar avatar-xs mb-2 mb-md-0">
                                            <img src="/images/avatar/09.jpg" class="rounded-circle" alt="">
                                        </div>
                                        <div class="mb-0 ms-2">
                                            <!-- Title -->
                                            <h6 class="mb-0"><a href="#" class="stretched-link">Lori Stevens</a>
                                            </h6>
                                        </div>
                                    </div>
                                </td>

                                <!-- Table data -->
                                <td class="text-center text-sm-start">
                                    <h6 class="mb-0">29 Nov 2021</h6>
                                </td>

                                <!-- Table data -->
                                <td>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item me-0 small"><i
                                                class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0 small"><i
                                                class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0 small"><i
                                                class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0 small"><i
                                                class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0 small"><i
                                                class="fas fa-star text-warning"></i></li>
                                    </ul>
                                </td>

                                <!-- Table data -->
                                <td>
                                    <a href="#" class="btn btn-sm btn-info-soft mb-0" data-bs-toggle="modal"
                                        data-bs-target="#viewReview">View</a>
                                    <button class="btn btn-sm btn-danger-soft me-1 mb-1 mb-md-0">Delete</button>
                                </td>
                            </tr>

                            <!-- Table row -->
                            <tr>
                                <!-- Table data -->
                                <td>
                                    <div class="d-flex align-items-center position-relative">
                                        <!-- Image -->
                                        <div class="avatar avatar-xs mb-2 mb-md-0">
                                            <img src="/images/avatar/01.jpg" class="rounded-circle" alt="">
                                        </div>
                                        <div class="mb-0 ms-2">
                                            <!-- Title -->
                                            <h6 class="mb-0"><a href="#" class="stretched-link">Carolyn
                                                    Ortiz</a></h6>
                                        </div>
                                    </div>
                                </td>

                                <!-- Table data -->
                                <td class="text-center text-sm-start">
                                    <h6 class="mb-0">15 Nov 2021</h6>
                                </td>

                                <!-- Table data -->
                                <td>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item me-0 small"><i
                                                class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0 small"><i
                                                class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0 small"><i
                                                class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0 small"><i
                                                class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0 small"><i
                                                class="fas fa-star text-warning"></i></li>
                                    </ul>
                                </td>

                                <!-- Table data -->
                                <td>
                                    <a href="#" class="btn btn-sm btn-info-soft mb-0" data-bs-toggle="modal"
                                        data-bs-target="#viewReview">View</a>
                                    <button class="btn btn-sm btn-danger-soft me-1 mb-1 mb-md-0">Delete</button>
                                </td>
                            </tr>

                            <!-- Table row -->
                            <tr>
                                <!-- Table data -->
                                <td>
                                    <div class="d-flex align-items-center position-relative">
                                        <!-- Image -->
                                        <div class="avatar avatar-xs mb-2 mb-md-0">
                                            <img src="/images/avatar/03.jpg" class="rounded-circle" alt="">
                                        </div>
                                        <div class="mb-0 ms-2">
                                            <!-- Title -->
                                            <h6 class="mb-0"><a href="#" class="stretched-link">Dennis
                                                    Barrett</a></h6>
                                        </div>
                                    </div>
                                </td>

                                <!-- Table data -->
                                <td class="text-center text-sm-start">
                                    <h6 class="mb-0">28 Oct 2021</h6>
                                </td>

                                <!-- Table data -->
                                <td>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item me-0 small"><i
                                                class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0 small"><i
                                                class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0 small"><i
                                                class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0 small"><i
                                                class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0 small"><i
                                                class="fas fa-star-half-alt text-warning"></i></li>
                                    </ul>
                                </td>
                                <!-- Table data -->
                                <td>
                                    <a href="#" class="btn btn-sm btn-info-soft mb-0" data-bs-toggle="modal"
                                        data-bs-target="#viewReview">View</a>
                                    <button class="btn btn-sm btn-danger-soft me-1 mb-1 mb-md-0">Delete</button>
                                </td>
                            </tr>

                            <!-- Table row -->
                            <tr>
                                <!-- Table data -->
                                <td>
                                    <div class="d-flex align-items-center position-relative">
                                        <!-- Image -->
                                        <div class="avatar avatar-xs mb-2 mb-md-0">
                                            <img src="/images/avatar/04.jpg" class="rounded-circle" alt="">
                                        </div>
                                        <div class="mb-0 ms-2">
                                            <!-- Title -->
                                            <h6 class="mb-0"><a href="#" class="stretched-link">Billy
                                                    Vasquez</a></h6>
                                        </div>
                                    </div>
                                </td>

                                <!-- Table data -->
                                <td class="text-center text-sm-start">
                                    <h6 class="mb-0"><a href="#">12 Oct 2021</a></h6>
                                </td>

                                <!-- Table data -->
                                <td>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item me-0 small"><i
                                                class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0 small"><i
                                                class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0 small"><i
                                                class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0 small"><i
                                                class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0 small"><i
                                                class="fas fa-star-half-alt text-warning"></i></li>
                                    </ul>
                                </td>

                                <!-- Table data -->
                                <td>
                                    <a href="#" class="btn btn-sm btn-info-soft mb-0" data-bs-toggle="modal"
                                        data-bs-target="#viewReview">View</a>
                                    <button class="btn btn-sm btn-danger-soft me-1 mb-1 mb-md-0">Delete</button>
                                </td>
                            </tr>

                            <!-- Table row -->
                            <tr>
                                <!-- Table data -->
                                <td>
                                    <div class="d-flex align-items-center position-relative">
                                        <!-- Image -->
                                        <div class="avatar avatar-xs mb-2 mb-md-0">
                                            <img src="/images/avatar/05.jpg" class="rounded-circle" alt="">
                                        </div>
                                        <div class="mb-0 ms-2">
                                            <!-- Title -->
                                            <h6 class="mt-2"><a href="#" class="stretched-link">Jacqueline
                                                    Miller</a></h6>
                                        </div>
                                    </div>
                                </td>

                                <!-- Table data -->
                                <td class="text-center text-sm-start">
                                    <h6 class="mb-0"><a href="#">31 Sep 2021</a></h6>
                                </td>

                                <!-- Table data -->
                                <td>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item me-0 small"><i
                                                class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0 small"><i
                                                class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0 small"><i
                                                class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0 small"><i
                                                class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0 small"><i
                                                class="far fa-star text-warning"></i></li>
                                    </ul>
                                </td>

                                <!-- Table data -->
                                <td>
                                    <a href="#" class="btn btn-sm btn-info-soft mb-0" data-bs-toggle="modal"
                                        data-bs-target="#viewReview">View</a>
                                    <button class="btn btn-sm btn-danger-soft me-1 mb-1 mb-md-0">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                        <!-- Table body END -->
                    </table>
                </div>
                <!-- Table END -->
            </div>
            <!-- Card body END -->

            <!-- Card footer START -->
            <div class="card-footer bg-transparent">
                <!-- Pagination START -->
                <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                    <!-- Content -->
                    <p class="mb-0 text-center text-sm-start">Showing 1 to 8 of 20 entries</p>
                    <!-- Pagination -->
                    <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
                        <ul
                            class="pagination pagination-sm pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
                            <li class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i
                                        class="fas fa-angle-left"></i></a></li>
                            <li class="page-item mb-0"><a class="page-link" href="#">1</a></li>
                            <li class="page-item mb-0 active"><a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item mb-0"><a class="page-link" href="#">3</a></li>
                            <li class="page-item mb-0"><a class="page-link" href="#"><i
                                        class="fas fa-angle-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
                <!-- Pagination END -->
            </div>
            <!-- Card footer END -->
        </div>
    </div>
    <!-- Student review END -->

</div> <!-- Row END -->

<!-- Popup modal for reviwe START -->
<div class="modal fade" id="viewReview" tabindex="-1" aria-labelledby="viewReviewLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="viewReviewLabel">Review</h5>
                <button type="button" class="btn btn-sm btn-light mb-0 ms-auto" data-bs-dismiss="modal"
                    aria-label="Close"><i class="bi bi-x-lg"></i></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="d-md-flex">
                    <!-- Avatar -->
                    <div class="avatar avatar-md me-4 flex-shrink-0">
                        <img class="avatar-img rounded-circle" src="/images/avatar/09.jpg" alt="avatar">
                    </div>
                    <!-- Text -->
                    <div>
                        <div class="d-sm-flex mt-1 mt-md-0 align-items-center">
                            <h5 class="me-3 mb-0">Lori Stevens</h5>
                            <!-- Review star -->
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="far fa-star text-warning"></i></li>
                            </ul>
                        </div>
                        <!-- Info -->
                        <p class="small mb-2">2 days ago</p>
                        <p class="mb-2">Handsome met debating sir dwelling age material. As style lived he worse
                            dried. Offered related so visitors we private removed. Moderate do subjects to distance.
                        </p>
                        <p class="mb-2">As style lived he worse dried. Offered related so visitors we private
                            removed. Moderate do subjects to distance. </p>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger-soft my-0" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Popup modal for reviwe END -->
@endsection