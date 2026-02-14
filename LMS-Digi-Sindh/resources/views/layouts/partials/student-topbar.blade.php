<div class="container mt-n4">
    <div class="row">
        <div class="col-12">
            <div class="card bg-transparent card-body pb-0 px-0 mt-2 mt-sm-0">
                <div class="row d-sm-flex justify-sm-content-between mt-2 mt-md-0">
                    <!-- Avatar -->
                    <div class="col-auto">
                        <div class="avatar avatar-xxl position-relative mt-n3">
                            @if(auth()->user()->avatar_url)
                                <img class="avatar-img rounded-circle border border-white border-3 shadow" src="{{ auth()->user()->avatar_url }}" alt="">
                            @elseif(auth()->user()->userDetail ?? null)
                                <div class="avatar-img rounded-circle border border-white border-3 shadow bg-primary text-white d-flex align-items-center justify-content-center text-uppercase fw-bold" style="width:5rem;height:5rem;font-size:1.5rem;">{{ substr(auth()->user()->userDetail->first_name ?? '', 0, 1) }}{{ substr(auth()->user()->userDetail->last_name ?? '', 0, 1) }}</div>
                            @else
                                <div class="avatar-img rounded-circle border border-white border-3 shadow bg-primary text-white d-flex align-items-center justify-content-center text-uppercase fw-bold" style="width:5rem;height:5rem;font-size:1.5rem;">{{ substr(auth()->user()->email ?? 'U', 0, 1) }}</div>
                            @endif
                        </div>
                    </div>
                    <!-- Profile info -->
                    <div class="col d-sm-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="my-1 fs-4">{{ auth()->user()->name }}</h1>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item me-3 mb-1 mb-sm-0">
                                    <span class="h6">{{ auth()->user()->enrollments()->count() }}</span>
                                    <span class="text-body fw-light">Enrolled courses</span>
                                </li>
                                <li class="list-inline-item me-3 mb-1 mb-sm-0">
                                    <span class="h6">0</span>
                                    <span class="text-body fw-light">Completed courses</span>
                                </li>
                                <li class="list-inline-item me-3 mb-1 mb-sm-0">
                                    <span class="h6">0</span>
                                    <span class="text-body fw-light">Completed lessons</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Advanced filter responsive toggler START -->
            <!-- Divider -->
            <hr class="d-xl-none">
            <div class="col-12 col-xl-3 d-flex justify-content-between align-items-center">
                <a class="h6 mb-0 fw-bold d-xl-none" href="#">Menu</a>
                <button class="btn btn-primary d-xl-none" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
                    <i class="fas fa-sliders-h"></i>
                </button>
            </div>
            <!-- Advanced filter responsive toggler END -->
        </div>
    </div>
</div>