@extends('DSIMT-Webiste.layout')

@section('content')


    <!-- banner starts -->
    <section class="home-3 banner-main banner-3 pb-0">
      <div class="banner-content">
        <div class="slider banner-slider">
          <div
            class="h2-slider-list"
            style="background-image: url({{ asset('dsimt-assets/images/') }}banner/thoughtful-student-using-laptop-and-headphones-for-2021-05-07-23-15-28-utc.jpg)"
          >
            <div class="container">
              <div class="slide-contain text-center wow fadeInUp">
                <h1 class="cl-white mt-4">ACCESS 2700+ ONLINE TUTORIALS FROM TOP INSTRUCTORS</h1>
                <p class="cl-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunta</p>
                <div class="slide-btn mt-4">
                  <a href="course-1.html" class="btn mr-2">View All Course</a>
                </div>
              </div>
            </div>
            <div class="sl-overlay"></div>
          </div>
          <div class="h2-slider-list" style="background-image: url({{ asset('dsimt-assets/images/') }}banner/education-2021-04-04-14-25-07-utc.jpg)">
            <div class="container">
              <div class="slide-contain text-center wow fadeInUp">
                <h1 class="cl-white mt-4">FIND THE RIGHT ONLINE COURSES FOR YOU</h1>
                <p class="cl-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunta</p>
                <div class="slide-btn mt-4">
                  <a href="course-2.html" class="btn mr-2">Find More</a>
                </div>
              </div>
            </div>
            <div class="sl-overlay"></div>
          </div>
          <div class="h2-slider-list" style="background-image: url({{ asset('dsimt-assets/images/') }}banner/education-PHW33SU.jpg)">
            <div class="container">
              <div class="slide-contain text-center wow fadeInUp">
                <h1 class="cl-white mt-4">DSIMT HAS MORE THAN 180 MAJORS & MINORS COURSES</h1>
                <p class="cl-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunta</p>
                <div class="slide-btn mt-4">
                  <button class="btn mr-2">Find More</button>
                </div>
              </div>
            </div>
            <div class="sl-overlay"></div>
          </div>
        </div>
      </div>
    </section>
    <!-- banner ends -->

    <!-- content main start -->
    <section class="home-3 services-main pb-0">
      <div class="container">
        <div class="service-full wow fadeInRight">
          <div class="row">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-6 col-md-12 pr-lg-0 wow fadeInLeftBig">
                  <div class="serv-wrap-img">
                    <img src="{{ asset('dsimt-assets/images/') }}inner/girl-doing-homework-or-online-education-2021-04-05-10-57-55-utc.jpg" alt="" />
                  </div>
                </div>
                <div class="col-lg-6 col-md-12 pl-lg-0 wow fadeInRightBig">
                  <div class="serv-us-wrap d-flex flex-column justify-content-center">
                    <div class="serv-title">
                      <h4 class="top-title mb-3">Fall 2021 applications are now open</h4>
                      <h2 class="mb-3 pb-3 cl-white">APPLY FOR ADMISSION</h2>
                    </div>
                    <div class="serv-content">
                      <p class="cl-white">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12">
              <div class="row service-list-wrap">
                <div class="col-lg-3 col-md-6 pr-0">
                  <div class="service-ct-list bg-scblue">
                    <i class="far fa-user"></i>
                    <div class="serv-list text-left">
                      <h4 class="cl-white mb-0">UNIVERSITY LIFE</h4>
                      <span>Overall in here</span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 p-0">
                  <div class="service-ct-list bg-scgreen">
                    <i class="fas fa-book-open"></i>
                    <div class="serv-list text-left">
                      <h4 class="cl-white mb-0">GRADUATION</h4>
                      <span>Getting Diploma</span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 p-0">
                  <div class="service-ct-list bg-sc-lblue">
                    <i class="fas fa-globe-americas"></i>
                    <div class="serv-list text-left">
                      <h4 class="cl-white mb-0">BEST INSTRUCTORS</h4>
                      <span>Certified Teachers</span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 pl-0">
                  <div class="service-ct-list bg-sc-dblue">
                    <i class="fas fa-book"></i>
                    <div class="serv-list text-left">
                      <h4 class="cl-white mb-0">GLOBAL HUBS</h4>
                      <span>Overall In Here</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End content main -->

    <!-- About start -->
    <section class="home-3 about-company">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-12 wow fadeInLeftBig">
            <div class="about-wrap-img d-flex flex-column justify-content-center h-100">
              <img src="{{ asset('dsimt-assets/images/') }}logo-w.png" alt="" />
              <h2 class="cl-blue">ABOUT OUR DSIMT</h2>
            </div>
          </div>
          <div class="col-lg-7 col-md-12 wow fadeInRightBig">
            <div class="about-us-wrap">
              <div class="about-title-n">
                <h4 class="top-title">LEARN SOMETHING NEW, AND GROW YOUR SKILLS</h4>
              </div>
              <div class="about-content">
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum dignissimos, deleniti adipisci ut inventore commodi iure explicabo excepturi
                  cumque laudantium quis praesentium id nesciunt! Soluta sunt obcaecati aspernatur nostrum ab.
                </p>
                <p class="mb-4">
                  Using our single innovative platform you can remove all your communication dependencies and the messy rat’s nest of email, calls, texts,
                  wikis, and apps you currently have.
                </p>
                <a href="about.html" class="btn">Learn More</a>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="counter">
              <div class="counter-wrap wow fadeInUp">
                <div class="content d-flex justify-content-between">
                  <div class="value-pin">
                    <span class="countfect value" data-num="233"></span>
                    <h5>COURSES & VIDEOS</h5>
                  </div>
                  <div class="value-pin">
                    <span class="countfect value" data-num="410"></span>
                    <h5>EXPERT TEACHERS</h5>
                  </div>
                  <div class="value-pin">
                    <span class="countfect value" data-num="2299"></span>
                    <h5>TOTAL STUDENTS</h5>
                  </div>
                  <div class="value-pin">
                    <span class="countfect value" data-num="368"></span>
                    <h5>CLASSES COMPLETE</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- About end -->

    <!-- Browse start -->
    <section class="browse-main p-0">
      <div class="container">
        <div class="section-title sc-center justify-content-center text-center borderline">
          <div class="title-top">
            <div class="title-quote">
              <span>Browse Categories</span>
            </div>
            <h2>BROWSE ONLINE COURSE <span class="cl-blue">Categories</span></h2>
          </div>
        </div>
        <div class="d-flex align-items-center justify-content-between">
          <div class="browse-list">
            <a href="course-2.html">
              <i class="far fa-chart-bar"></i>
              <h4>BUSINESS & MANAGEMENT</h4>
            </a>
          </div>
          <div class="browse-list">
            <a href="course-2.html">
              <i class="fas fa-video"></i>
              <h4>MOVIE FILM MAKING</h4>
            </a>
          </div>
          <div class="browse-list">
            <a href="course-2.html">
              <i class="fas fa-tools"></i>
              <h4>SOFTWARE TRAINING</h4>
            </a>
          </div>
          <div class="browse-list">
            <a href="course-2.html">
              <i class="fas fa-brush"></i>
              <h4>GRAPHIC & WEB DESIGN</h4>
            </a>
          </div>
          <div class="browse-list">
            <a href="course-2.html">
              <i class="far fa-lightbulb"></i>
              <h4>LOGICAL THINKING</h4>
            </a>
          </div>
        </div>
        <div class="course-bse">
          <div class="d-flex align-items-center justify-content-center">
            <div class="course-b-list">
              <h4 class="cl-blue">UNDERGRADUATE</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
            </div>
            <div class="course-b-list bg-darkblue">
              <h4 class="cl-blue">GRADUATED & PROFESSIONAL</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
            </div>
            <div class="course-b-list">
              <h4 class="cl-blue">SCHOLARSHIP AID</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Browse end -->

    <!-- Courses start -->
    <section class="courses">
      <div class="container">
        <div class="section-title sc-center justify-content-center text-center borderline">
          <div class="title-top">
            <div class="title-quote">
              <span>Find More Courses</span>
            </div>
            <h2>ALL COURSES OF EPATHSHALA</h2>
          </div>
        </div>
        <div class="wrap-customize">
          <div class="row">
            <div class="col-lg-4 col-md-6 customize-wrap wow fadeInUp">
              <div class="customize-item">
                <div class="sv-image">
                  <img src="{{ asset('dsimt-assets/images/') }}courses/course-4.jpg" alt="" />
                </div>
                <div class="customize-ct">
                  <h4>
                    <a href="course-1.html">GROW YOUR BUSINESS BY MASTERED IN SOME TECHNIQUE</a>
                  </h4>
                  <div class="review-ct d-flex justify-content-start">
                    <a href="#">21 Reviews</a>
                    <ul class="ml-2">
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star-half-alt"></i></li>
                    </ul>
                  </div>
                </div>
                <div class="customize-bottom">
                  <ul class="d-flex justify-content-between">
                    <li><i class="far fa-user"></i> 2k+ Students</li>
                    <li><i class="far fa-clock"></i> 2h 45mins</li>
                    <li><i class="far fa-star"></i> 4.5 Reviews</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 customize-wrap wow fadeInUp">
              <div class="customize-item">
                <div class="sv-image">
                  <img src="{{ asset('dsimt-assets/images/') }}courses/course-5.jpg" alt="" />
                </div>
                <div class="customize-ct">
                  <h4>
                    <a href="course-1.html">GROW UP AUDIENCE TO PROGRESS BUSINESS</a>
                  </h4>
                  <div class="review-ct d-flex justify-content-start">
                    <a href="#">21 Reviews</a>
                    <ul class="ml-2">
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star-half-alt"></i></li>
                    </ul>
                  </div>
                </div>
                <div class="customize-bottom">
                  <ul class="d-flex justify-content-between">
                    <li><i class="far fa-user"></i> 2k+ Students</li>
                    <li><i class="far fa-clock"></i> 2h 45mins</li>
                    <li><i class="far fa-star"></i> 4.5 Reviews</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 customize-wrap wow fadeInUp">
              <div class="customize-item">
                <div class="sv-image">
                  <img src="{{ asset('dsimt-assets/images/') }}courses/course-6.jpg" alt="" />
                </div>
                <div class="customize-ct">
                  <h4>
                    <a href="course-1.html">JAVA PROGRAMMING A-Z FULLY CLASSES WITH FULL TASK</a>
                  </h4>
                  <div class="review-ct d-flex justify-content-start">
                    <a href="#">21 Reviews</a>
                    <ul class="ml-2">
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star-half-alt"></i></li>
                    </ul>
                  </div>
                </div>
                <div class="customize-bottom">
                  <ul class="d-flex justify-content-between">
                    <li><i class="far fa-user"></i> 2k+ Students</li>
                    <li><i class="far fa-clock"></i> 2h 45mins</li>
                    <li><i class="far fa-star"></i> 4.5 Reviews</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Courses ends -->

    <!-- Join now start -->
    <section class="join-now">
      <div class="container">
        <div class="row join-wrap">
          <div class="col-lg-7">
            <div class="join-content">
              <h3 class="cl-white">JOIN THE COMMUNITY COURSE AND <span class="cl-blue">UPGRADE YOUR SKILL</span></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              </p>
              <a href="contact.html" class="btn mt-2">Join Now</a>
            </div>
          </div>
          <div class="col-lg-5">
            <img src="{{ asset('dsimt-assets/images/') }}inner/friends-studying-in-the-park-2021-04-02-20-21-17-utc.jpg" alt="" />
          </div>
        </div>
      </div>
    </section>
    <!-- Join now end -->

    <!-- News/Events news start -->
    <section class="home-3 courses news-events">
      <div class="container">
        <div class="section-title sc-center borderline">
          <div class="title-top">
            <h2>UPCOMING EVENTS & COMPETITIONS</h2>
            <p>Online learning offers a new way to explore subjects you’re passionate about.</p>
          </div>
          <a href="event.html" class="btn">Read More</a>
        </div>
        <div class="wrap-customize">
          <div class="row">
            <div class="col-lg-4 col-md-6 customize-wrap wow fadeInUp">
              <div class="customize-item d-flex mb-3">
                <div class="sv-image pr-3">
                  <img src="{{ asset('dsimt-assets/images/') }}courses/event-1.jpg" alt="" />
                </div>
                <div class="customize-ct m-0">
                  <h6 class="mb-0">
                    <a href="#">THE NEXT GENERATION OF BUSINESS LEADERS</a>
                  </h6>
                  <span class="cust-meta"> August 20, 2021</span>
                </div>
              </div>
              <div class="customize-item d-flex mb-3">
                <div class="sv-image pr-3">
                  <img src="{{ asset('dsimt-assets/images/') }}courses/course-2.jpg" alt="" />
                </div>
                <div class="customize-ct m-0">
                  <h6 class="mb-0">
                    <a href="#">EPATHSHALA’S ALUMNI HOT AIR BALLON TRIP IN TURKEY</a>
                  </h6>
                  <span class="cust-meta"> August 20, 2021</span>
                </div>
              </div>
              <div class="customize-item d-flex mb-3">
                <div class="sv-image pr-3">
                  <img src="{{ asset('dsimt-assets/images/') }}courses/course-3.jpg" alt="" />
                </div>
                <div class="customize-ct m-0">
                  <h6 class="mb-0">
                    <a href="#">EPATHSHALA’S ALUMNI HOT AIR BALLON TRIP IN TURKEY</a>
                  </h6>
                  <span class="cust-meta"> August 20, 2021</span>
                </div>
              </div>
              <div class="customize-item d-flex">
                <div class="sv-image pr-3">
                  <img src="{{ asset('dsimt-assets/images/') }}courses/course-4.jpg" alt="" />
                </div>
                <div class="customize-ct m-0">
                  <h6 class="mb-0">
                    <a href="#">REUNION EVENT: EPATHSHALA’S ALUMNI GOLF TOUR</a>
                  </h6>
                  <span class="cust-meta"> August 20, 2021</span>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 customize-wrap wow fadeInUp">
              <div class="customize-item d-flex mb-3">
                <div class="sv-image pr-3">
                  <img src="{{ asset('dsimt-assets/images/') }}courses/course-2.jpg" alt="" />
                </div>
                <div class="customize-ct m-0">
                  <h6 class="mb-0">
                    <a href="#">EPATHSHALA’S ALUMNI HOT AIR BALLON TRIP IN TURKEY</a>
                  </h6>
                  <span class="cust-meta"> August 20, 2021</span>
                </div>
              </div>
              <div class="customize-item d-flex mb-3">
                <div class="sv-image pr-3">
                  <img src="{{ asset('dsimt-assets/images/') }}courses/event-1.jpg" alt="" />
                </div>
                <div class="customize-ct m-0">
                  <h6 class="mb-0">
                    <a href="#">THE NEXT GENERATION OF BUSINESS LEADERS</a>
                  </h6>
                  <span class="cust-meta"> August 20, 2021</span>
                </div>
              </div>
              <div class="customize-item d-flex mb-3">
                <div class="sv-image pr-3">
                  <img src="{{ asset('dsimt-assets/images/') }}courses/course-4.jpg" alt="" />
                </div>
                <div class="customize-ct m-0">
                  <h6 class="mb-0">
                    <a href="#">REUNION EVENT: EPATHSHALA’S ALUMNI GOLF TOUR</a>
                  </h6>
                  <span class="cust-meta"> August 20, 2021</span>
                </div>
              </div>
              <div class="customize-item d-flex">
                <div class="sv-image pr-3">
                  <img src="{{ asset('dsimt-assets/images/') }}courses/course-3.jpg" alt="" />
                </div>
                <div class="customize-ct m-0">
                  <h6 class="mb-0">
                    <a href="#">EPATHSHALA’S ALUMNI HOT AIR BALLON TRIP IN TURKEY</a>
                  </h6>
                  <span class="cust-meta"> August 20, 2021</span>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 customize-wrap wow fadeInUp">
              <div class="customize-item">
                <div class="sv-image">
                  <img src="{{ asset('dsimt-assets/images/') }}courses/event-3.jpg" alt="" />
                </div>
                <div class="customize-ct">
                  <h5>
                    <a href="#">Donation helps us</a>
                  </h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                  <button class="btn mt-3">Become a Doctor</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- News/Events news start -->

    <!-- Instructors start -->
    <section class="home-3 instructors">
      <div class="container">
        <div class="section-title sc-center justify-content-center text-center borderline">
          <div class="title-top">
            <div class="title-quote tq-white">
              <span>Meet Our Instructors</span>
            </div>
            <h2 class="cl-white">LEARN FROM EXPERT <span class="cl-blue">INSTRUCTORS</span></h2>
          </div>
        </div>
        <div class="row instruct-main mb-3 wow fadeInLeft">
          <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="ins-main-list">
              <img src="{{ asset('dsimt-assets/images/') }}team/team-1.jpg" alt="" />
              <div class="ins-names">
                <h4>William Smith</h4>
                <span class="cl-orange">CEO / Founder</span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="ins-main-list">
              <img src="{{ asset('dsimt-assets/images/') }}team/team-2.jpg" alt="" />
              <div class="ins-names">
                <h4>Nicole Kiyl</h4>
                <span class="cl-orange">Project Manager</span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="ins-main-list">
              <img src="{{ asset('dsimt-assets/images/') }}team/team-3.jpg" alt="" />
              <div class="ins-names">
                <h4>John Melton</h4>
                <span class="cl-orange">Instructor</span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="ins-main-list">
              <img src="{{ asset('dsimt-assets/images/') }}team/team-4.jpg" alt="" />
              <div class="ins-names">
                <h4>Ketti Helson</h4>
                <span class="cl-orange">Business Analyst</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="sl-overlay"></div>
    </section>
    <!-- Instructors ends -->

    <!-- Testimonial feedback -->
    <section class="testimonial">
      <div class="container">
        <div class="section-title sc-center justify-content-center text-center borderline">
          <div class="title-top">
            <div class="title-quote">
              <span>Customers reviews</span>
            </div>
            <h2>WHAT PEOPLE <span class="cl-blue">SAY</span></h2>
          </div>
        </div>
        <div class="row review-slider feedback-main wow fadeInUp">
          <div class="col-md-6">
            <div class="feedback-inner">
              <div class="consult-content">
                <p class="mb-0">
                  I am slide content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec
                  ullamcorper mattis, pulvinar dapibus leo.
                </p>
              </div>
              <div class="consult-title mt-3 d-flex justify-content-start">
                <img src="{{ asset('dsimt-assets/images/') }}team/user-1.jpg" alt="" />
                <div class="ps-name">
                  <h5 class="mb-0">Adam Cheis</h5>
                  <span class="cl-orange">Graphic Designer</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="feedback-inner">
              <div class="consult-content">
                <p class="mb-0">
                  I am slide content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec
                  ullamcorper mattis, pulvinar dapibus leo.
                </p>
              </div>
              <div class="consult-title mt-3 d-flex justify-content-start">
                <img src="{{ asset('dsimt-assets/images/') }}team/user-2.jpg" alt="" />
                <div class="ps-name">
                  <h5 class="mb-0">Amanda Lee</h5>
                  <span class="cl-orange">CEO & Founder Crix</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="feedback-inner">
              <div class="consult-content">
                <p class="mb-0">
                  I am slide content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec
                  ullamcorper mattis, pulvinar dapibus leo.
                </p>
              </div>
              <div class="consult-title mt-3 d-flex justify-content-start">
                <img src="{{ asset('dsimt-assets/images/') }}team/user-1.jpg" alt="" />
                <div class="ps-name">
                  <h5 class="mb-0">Adam Cheis</h5>
                  <span class="cl-orange">Graphic Designer</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="feedback-inner">
              <div class="consult-content">
                <p class="mb-0">
                  I am slide content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec
                  ullamcorper mattis, pulvinar dapibus leo.
                </p>
              </div>
              <div class="consult-title mt-3 d-flex justify-content-start">
                <img src="{{ asset('dsimt-assets/images/') }}team/user-2.jpg" alt="" />
                <div class="ps-name">
                  <h5 class="mb-0">Amanda Lee</h5>
                  <span class="cl-orange">CEO & Founder Crix</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Testimonial ends -->

    <!--  Blog to action start -->
    <section class="home-3 blog-article bg-white">
      <div class="container">
        <div class="section-title sc-center justify-content-center text-center borderline wow fadeInLeft">
          <div class="title-top">
            <div class="title-quote">
              <span class="bg-white">Our Blogs</span>
            </div>
            <h2>LATEST <span class="cl-blue">BLOG</span> & <span class="cl-blue">EVENTS</span></h2>
          </div>
        </div>
        <div class="blog-wrap">
          <div class="row">
            <div class="col-lg-4 col-md-6 wow fadeInRight">
              <div class="article-list">
                <div class="at-thumbnail">
                  <a href="blog-detail.html">
                    <img src="{{ asset('dsimt-assets/images/') }}blog/blog-1.jpg" alt="" />
                  </a>
                  <span class="blog-tag"> Education </span>
                </div>
                <div class="article-content">
                  <img src="{{ asset('dsimt-assets/images/') }}team/user-4.jpg" alt="" class="article-avatar" />
                  <div class="artl-detail">
                    <a href="blog-detail.html"><h4>NEW CHICAGO SCHOOL BUDGET RELIES ON PENSION</h4></a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                    <a href="blog-detail.html" class="bl-link">Read More <i class="fas fa-angle-double-right"></i></a>
                  </div>
                  <div class="artl-bottom">
                    <ul class="d-flex justify-content-start">
                      <li>June 12, 2021</li>
                      <li><a href="#">2 Comments</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInRight">
              <div class="article-list">
                <div class="at-thumbnail">
                  <a href="blog-detail.html">
                    <img src="{{ asset('dsimt-assets/images/') }}blog/blog-2.jpg" alt="" />
                  </a>
                  <span class="blog-tag"> Education </span>
                </div>
                <div class="article-content">
                  <img src="{{ asset('dsimt-assets/images/') }}team/user-5.jpg" alt="" class="article-avatar" />
                  <div class="artl-detail">
                    <a href="blog-detail.html"><h4>NEW CHICAGO SCHOOL BUDGET RELIES ON PENSION</h4></a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                    <a href="blog-detail.html" class="bl-link">Read More <i class="fas fa-angle-double-right"></i></a>
                  </div>
                  <div class="artl-bottom">
                    <ul class="d-flex justify-content-start">
                      <li>June 12, 2021</li>
                      <li><a href="#">2 Comments</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInRight">
              <div class="article-list">
                <div class="at-thumbnail">
                  <a href="blog-detail.html">
                    <img src="{{ asset('dsimt-assets/images/') }}blog/blog-3.jpg" alt="" />
                  </a>
                  <span class="blog-tag"> Education </span>
                </div>
                <div class="article-content">
                  <img src="{{ asset('dsimt-assets/images/') }}team/user-6.jpg" alt="" class="article-avatar" />
                  <div class="artl-detail">
                    <a href="blog-detail.html"><h4>NEW CHICAGO SCHOOL BUDGET RELIES ON PENSION</h4></a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                    <a href="blog-detail.html" class="bl-link">Read More <i class="fas fa-angle-double-right"></i></a>
                  </div>
                  <div class="artl-bottom">
                    <ul class="d-flex justify-content-start">
                      <li>June 12, 2021</li>
                      <li><a href="#">2 Comments</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--  Blog to action end -->

    <!--  Newsletter start -->
    <section class="newsletter">
      <div class="container">
        <div class="news-headding text-center">
          <h2>SIGN UP TO OUR NEWSLETTER</h2>
          <p>
            Subscribe to our newsletter and get many <br />
            interesting things every week
          </p>
          <form>
            <div class="form-group">
              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Your Email" />
              <button class="btn"><i class="fas fa-envelope-open-text"></i> Subscribe</button>
            </div>
          </form>
        </div>
      </div>
    </section>
    <!--  Newsletter end -->

@endsection
