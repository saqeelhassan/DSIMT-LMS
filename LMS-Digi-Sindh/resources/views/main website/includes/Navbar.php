<?php 
$pageActive = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], '/') +1);
$currentPage = basename($_SERVER['PHP_SELF']);
$queryString = $_SERVER['QUERY_STRING'];

$currentURL = $currentPage . '?' . $queryString;

?>

<!-- Preloader -->
<div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    
    
    <!-- Start Header Area -->
    <header class="header navbar-area" style="z-index: 30;">
        <!-- Toolbar Start -->
        <div class="toolbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6 col-12">
                        <div class="toolbar-social">
                            <ul>
                                <li><span class="title">Follow Us On : </span></li>
                                <li><a href="https://web.facebook.com/DSIMTHYD"><i class="lni lni-facebook-original"></i></a></li>
                                <li><a href="https://twitter.com/DigitalSindhIMT"><i class="lni lni-twitter-original"></i></a></li>
                                <li><a href="digital_sindh_imt"><i class="lni lni-instagram"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/digital-sindh-institute-of-management-nd-technology/"><i class="lni lni-linkedin-original"></i></a></li>
                                <li><a href="digitalsindhimt@gmail.com"><i class="lni lni-google"></i></a></li>
                            </ul>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="toolbar-login">
                            <div class="button">
                                <div class="modal fade" id="exampleModalToggle" tabindex="-1" aria-labelledby="exampleModalToggleLabel" aria-hidden="true" style="z-index: 1050;">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content bg-transparent">
                                            <div class="modal-header">
                                                <!-- <h5 class="modal-title text-white" id="exampleModalToggleLabel">Search</h5> -->
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="d-flex">
                                                    <div class="form-floating w-100">
                                                        <input type="search" class="form-control me-2 text-white bg-transparent" id="floatingInput" placeholder="Search">
                                                        <label for="floatingInput" class="text-white">Search</label>
                                                    </div>
                                                    <button class="btn btn-outline-success bg-transparent" type="submit">
                                                        <i class="lni lni-search-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                  <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"><i class="lni lni-search-alt"></i></button>
                                <a href="login.php" class="btn">Log In</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Toolbar End -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                <div class="nav-inner">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="index.php">
                               
                                <img class="image logo im-fluid" src="assets/images/logo/logo1.png" alt="Logo"> 
                                
                            </a>
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse  navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item"><a class="<?php if ($pageActive == "index.php") { echo ' active" aria-current="page'; } ?>" href="index.php">Home</a></li>
                                <li class="nav-item"><a class="<?php if ($pageActive == "about-us.php") { echo ' active" aria-current="page'; } ?>" href="about-us.php">About Us</a></li>

                                <li class="nav-item">
                                    <a href="javascript:void(0)" class="page-scroll dd-menu collaped <?php if ($pageActive == "courses.php" || $pageActive == "board_courses.php" || $pageActive == "special_course.php" || $pageActive == "scholarship_course.php") { echo ' active" aria-current="page';}?>" data-bs-toggle="collapse" data-bs-target="#submenu-1-2" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Services</a>
                                    <ul class="sub-menu collapse" id="submenu-1-2">
                                        <li class="nav-item">
                                            <a href="javascript:void(0)" class="page-scroll dd-menu collapsed"data-bs-toggle="collapse"data-bs-target="#submenu-1-2"aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Course</a>
                                            <ul class="sub-menu collapse" id="submenu-1-4">
                                                <li class="nav-item"><a href="courses.php">Featured Courses</a></li>
                                                <li class="nav-item"><a href="board_courses.php">Board Courses</a>
                                                </li>
                                                <li class="nav-item"><a href="special_course.php">Special Courses</a></li>
                                                <li class="nav-item"><a href="scholarship_course.php"> Scholarship-Based Courses </a><li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:void(0)" class="page-scroll dd-menu collapsed"data-bs-toggle="collapse"data-bs-target="#submenu-1-2"aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Scholarships</a>
                                            <ul class="sub-menu collapse" id="submenu-1-4">
                                                <li class="nav-item"><a href="merit_scholarship.php">Merit-Based Scholarships</a></li>
                                                <li class="nav-item"><a href="coming_soon.php?id=<?php echo 1?>">NAVTTC-Based Scholarships</a></li>
                                                <li class="nav-item"><a href="coming_soon.php?id=<?php echo 1?>">BBSHRRDB-Based Scholarships</a></li>
                                                <li class="nav-item"><a href="coming_soon.php?id=<?php echo 1?>">PITP-Based Scholarships</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:void(0)" class="page-scroll dd-menu collapsed"data-bs-toggle="collapse"data-bs-target="#submenu-1-2"aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Internships</a>
                                            <ul class="sub-menu collapse" id="submenu-1-4">
                                                <li class="nav-item"><a href="merit_internships.php">Merit-Based Internships</a></li>
                                                <li class="nav-item"><a href="coming_soon.php?id=<?php echo 2?>">Need-Based Internships</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item"><a class="<?php if ($pageActive == "our-gallery.php") { echo ' active" aria-current="page';}?>" href="our-gallery.php">gallery</a></li>
                                <li class="nav-item"><a class="<?php if ($pageActive == "events-grid.php") { echo ' active" aria-current="page';}?>" href="events-grid.php">Events</a></li>
                                <li class="nav-item"><a class="<?php if ($pageActive == "contact.php") { echo ' active" aria-current="page';}?>" href="contact.php">Contact Us</a></li>
                                
                            </ul>
                        </div> <!-- navbar collapse -->
                    </nav> <!-- navbar -->
                </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    <!-- End Header Area -->