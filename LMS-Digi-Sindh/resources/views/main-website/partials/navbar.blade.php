<!-- Preloader -->
<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>

<!-- Start Header Area -->
<header class="header navbar-area header-dsimt-pro" style="z-index: 999;">
    <div class="toolbar-area">
        <div class="container">
            <div class="toolbar-row">
                <div class="toolbar-left">
                    <div class="toolbar-social">
                        <span class="toolbar-label">Follow Us</span>
                        <div class="social-icons">
                            <a href="https://web.facebook.com/DSIMTHYD" aria-label="Facebook"><i class="lni lni-facebook-original"></i></a>
                            <a href="https://twitter.com/DigitalSindhIMT" aria-label="Twitter"><i class="lni lni-twitter-original"></i></a>
                            <a href="https://www.instagram.com/digital_sindh_imt" aria-label="Instagram"><i class="lni lni-instagram"></i></a>
                            <a href="https://www.linkedin.com/company/digital-sindh-institute-of-management-nd-technology/" aria-label="LinkedIn"><i class="lni lni-linkedin-original"></i></a>
                        </div>
                    </div>
                </div>
                <div class="toolbar-right">
                    <div class="toolbar-actions">
                        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true" style="z-index: 1060;">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content search-modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title text-white" id="searchModalLabel">Search Courses</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body py-4">
                                        <form class="d-flex gap-2 flex-column flex-md-row" action="{{ route('courses.index') }}" method="GET">
                                            <input type="search" class="form-control form-control-lg search-input" placeholder="Search courses..." name="q" autocomplete="off">
                                            <button class="btn btn-orange px-4" type="submit"><i class="lni lni-search-alt me-2"></i> Search</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('lms.index') }}" class="btn-toolbar btn-toolbar-lms"><i class="lni lni-graduation me-2"></i> LMS Portal</a>
                        <button class="btn-toolbar btn-toolbar-icon" data-bs-target="#searchModal" data-bs-toggle="modal" aria-label="Search"><i class="lni lni-search-alt"></i></button>
                        <a href="{{ route('dsimt.login') }}" class="btn-toolbar btn-toolbar-login"><i class="lni lni-user me-2"></i> Log In</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-main">
        <div class="container">
            <div class="nav-inner">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="{{ route('index') }}">
                        <img class="img-fluid" src="{{ asset('dsimt/images/logo/logo1.png') }}" alt="Digital Sindh Institute">
                    </a>
                    <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                    </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item"><a class="nav-link {{ request()->routeIs('dsimt.index') || request()->routeIs('index') ? 'active' : '' }}" href="{{ route('index') }}">Home</a></li>
                                <li class="nav-item"><a class="nav-link {{ request()->routeIs('dsimt.about-us') ? 'active' : '' }}" href="{{ route('dsimt.about-us') }}">About Us</a></li>
                                <li class="nav-item nav-item-dropdown">
                                    <a href="javascript:void(0)" class="page-scroll dd-menu nav-link {{ request()->routeIs('courses.index') || request()->routeIs('dsimt.board-courses') || request()->routeIs('dsimt.special-course') || request()->routeIs('dsimt.scholarship-course') || request()->routeIs('dsimt.merit-scholarship') || request()->routeIs('dsimt.merit-internships') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#submenu-services" aria-controls="submenu-services" aria-expanded="false" aria-label="Toggle navigation">Services <i class="lni lni-chevron-down ms-1 nav-arrow"></i></a>
                                    <ul class="sub-menu collapse" id="submenu-services">
                                        <li class="nav-item submenu-parent">
                                            <a href="javascript:void(0)" class="dd-menu collapsed" data-bs-toggle="collapse" data-bs-target="#submenu-courses" aria-controls="submenu-courses" aria-expanded="false">Course <i class="lni lni-chevron-right submenu-arrow"></i></a>
                                            <ul class="sub-menu collapse" id="submenu-courses">
                                                <li class="nav-item"><a href="{{ route('courses.index') }}">Featured Courses</a></li>
                                                <li class="nav-item"><a href="{{ route('dsimt.board-courses') }}">Board Courses</a></li>
                                                <li class="nav-item"><a href="{{ route('dsimt.special-course') }}">Special Courses</a></li>
                                                <li class="nav-item"><a href="{{ route('dsimt.scholarship-course') }}">Scholarship-Based Courses</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item submenu-parent">
                                            <a href="javascript:void(0)" class="dd-menu collapsed" data-bs-toggle="collapse" data-bs-target="#submenu-scholarships" aria-controls="submenu-scholarships" aria-expanded="false">Scholarships <i class="lni lni-chevron-right submenu-arrow"></i></a>
                                            <ul class="sub-menu collapse" id="submenu-scholarships">
                                                <li class="nav-item"><a href="{{ route('dsimt.merit-scholarship') }}">Merit-Based Scholarships</a></li>
                                                <li class="nav-item"><a href="{{ route('dsimt.coming-soon', ['id' => 1]) }}">NAVTTC-Based Scholarships</a></li>
                                                <li class="nav-item"><a href="{{ route('dsimt.coming-soon', ['id' => 1]) }}">BBSHRRDB-Based Scholarships</a></li>
                                                <li class="nav-item"><a href="{{ route('dsimt.coming-soon', ['id' => 1]) }}">PITP-Based Scholarships</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item submenu-parent">
                                            <a href="javascript:void(0)" class="dd-menu collapsed" data-bs-toggle="collapse" data-bs-target="#submenu-internships" aria-controls="submenu-internships" aria-expanded="false">Internships <i class="lni lni-chevron-right submenu-arrow"></i></a>
                                            <ul class="sub-menu collapse" id="submenu-internships">
                                                <li class="nav-item"><a href="{{ route('dsimt.merit-internships') }}">Merit-Based Internships</a></li>
                                                <li class="nav-item"><a href="{{ route('dsimt.coming-soon', ['id' => 2]) }}">Need-Based Internships</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link {{ request()->routeIs('dsimt.gallery') ? 'active' : '' }}" href="{{ route('dsimt.gallery') }}">Gallery</a></li>
                                <li class="nav-item"><a class="nav-link {{ request()->routeIs('dsimt.events') ? 'active' : '' }}" href="{{ route('dsimt.events') }}">Events</a></li>
                                <li class="nav-item"><a class="nav-link {{ request()->routeIs('dsimt.contact') ? 'active' : '' }}" href="{{ route('dsimt.contact') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End Header -->
