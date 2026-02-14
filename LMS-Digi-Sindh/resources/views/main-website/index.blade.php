@extends('main-website.layouts.main')

@section('title', 'Digital Sindh Institute | IT & Digital Skills Training in Sindh')
@section('description', 'Join Digital Sindh Institute and boost your career with professional IT courses, diplomas, and digital skills training in Sindh. Admissions open now!')

@section('content')
<!-- Module NOtification -->
 <div id="mymodal" class="mymodal" tabindex="-1">
        <div class="modal-content">
            <h5 class="modal-title">People's information Technology Programme Phase-II Batch-III </h5>
            <span class="close">&times;</span>
            <div class="modal-body">
                <a href="#" target="_blank">
                    <img src="{{ asset('dsimt/images/events/post.jpeg') }}" alt="" class="w-100">
                </a>
                <div class="button wow fadeInUp mt-3" data-wow-delay=".9s">
                    <!--<a href="" class="btn">Enroll Now</a>-->
                    <a href="{{ route('dsimt.admission-pitp-form') }}" class="btn" target="_blank">
                        Enroll Now
                    </a>
                    <!--<p style="color: #012169;">-->
                    <!--    <b class="text-danger">Note:</b> Please submit your required documents in person at the institute. Online registration is not available.-->
                    <!--</p>-->
                </div>
            </div>
        </div>
      </div>
   
    <!-- Start Hero Area -->
     <section class="hero-area">
        <div class="hero-slider">
            <!-- Single Slider -->
             <div class="hero-inner overlay" style="background-image: url('{{ asset('dsimt/images/dsimt_imgs/wall.jpg') }}');">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-8 offset-lg-2 col-md-12 co-12">
                            <div class="home-slider">
                                <div class="hero-text">
                                    <h5 class="wow fadeInUp" data-wow-delay=".3s">Begin your journey towards professionalism today.</h5>
                                    <h1 class="wow fadeInUp" data-wow-delay=".5s">Real Technologist Producer<br> </h1>
                                   
                                    <p class="wow fadeInUp" data-wow-delay=".7s">
                                        "Cutting-edge tech production service. <br> We create and deliver innovative solutions and content for a dynamic digital landscape"
                                    </p>
                                    <div class="button wow fadeInUp" data-wow-delay=".9s">
                                        <a href="{{ route('dsimt.admission-pitp-form') }}" class="btn">Enroll Now</a>
                                        <a href="{{ route('courses.index') }}" class="btn alt-btn">Our Courses</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Single Slider -->
            <!-- Single Slider -->
             <div class="hero-inner overlay" style="background-image: url('{{ asset('dsimt/images/dsimt_imgs/adm.png') }}');">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-8 offset-lg-2 col-md-12 co-12">
                            <div class="home-slider">
                                <div class="hero-text">
                                    <h5 class="wow fadeInUp" data-wow-delay=".3s">Start coding your way to success today!</h5>
                                    
                                    <h1 class="wow fadeInUp" data-wow-delay=".5s">Innovation Paradise<br> For Students </h1>
                                    <p class="wow fadeInUp" data-wow-delay=".7s">"We empower students by cultivating excellence, <br> ensuring they thrive in an environment that encourages creative thinking, problem-solving, and groundbreaking ideas"</p>
                                    <div class="button wow fadeInUp" data-wow-delay=".9s">
                                        <a href="{{ route('dsimt.contact') }}" class="btn">Enroll now</a>
                                        <a href="{{ route('dsimt.services') }}" class="btn alt-btn">Our Services</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Single Slider -->
            <!-- Single Slider -->
             <div class="hero-inner overlay" style="background-image: url('{{ asset('dsimt/images/dsimt_imgs/wall4.jpg') }}');">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-8 offset-lg-2 col-md-12 co-12">
                            <div class="home-slider">
                                <div class="hero-text">
                                    <h5 class="wow fadeInUp" data-wow-delay=".3s">Begin your journey towards IT excellence now!</h5>
                                    <h1 class="wow fadeInUp" data-wow-delay=".5s">Your Ideas Will Be <br> Heard & Supported</h1>
                                    <p class="wow fadeInUp" data-wow-delay=".7s">"Join a creative workplace that actively supports and empowers your ideas, <br> providing resources to turn them into impactful innovations"</p>
                                    <div class="button wow fadeInUp" data-wow-delay=".9s">
                                        <a href="{{ route('dsimt.contact') }}" class="btn">Enroll Now</a>
                                        <a href="{{ route('dsimt.services') }}" class="btn alt-btn">Our Experienced Team</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Single Slider -->
         </div>
    </section> 
    <!--/ End Hero Area -->

    <!--<div id="coverflow" class="flip-slides pb-5">-->
    <!--    <div class="flip-overlflow">-->
    <!--        <ul class="flip-items">-->
    <!--            <li data-flip-title="Red">-->
    <!--                <img src="{{ asset('dsimt/images/carousel/web-development.jpeg') }}" width="380px">-->
    <!--            </li>-->
    <!--            <li data-flip-title="Razzmatazz" data-flip-category="Purples">-->
    <!--                <img src="{{ asset('dsimt/images/carousel/python.jpeg') }}" width="380px">-->
    <!--            </li>-->
    <!--            <li data-flip-title="Deep Lilac" data-flip-category="Purples">-->
    <!--                <img src="{{ asset('dsimt/images/carousel/graphic-designing.jpeg') }}" width="380px">-->
    <!--            </li>-->
    <!--            <li data-flip-title="Daisy Bush" data-flip-category="Purples">-->
    <!--                <img src="{{ asset('dsimt/images/carousel/courses.jpeg') }}" width="380px">-->
    <!--            </li>-->
    <!--            <li data-flip-title="Cerulean Blue" data-flip-category="Blues">-->
    <!--                <img src="{{ asset('dsimt/images/carousel/e-commerce.jpeg') }}" width="380px">-->
    <!--            </li>-->
    <!--            <li data-flip-title="Dodger Blue" data-flip-category="Blues">-->
    <!--                <img src="{{ asset('dsimt/images/carousel/digital-marketing.jpeg') }}" width="380px">-->
    <!--            </li>-->
    <!--            <li data-flip-title="Cyan" data-flip-category="Blues">-->
    <!--                <img src="{{ asset('dsimt/images/carousel/cyber-security.jpeg') }}" width="380px">-->
    <!--            </li>-->
    <!--        </ul>-->
    <!--        <div class="button wow fadeInUp text-center" data-wow-delay=".9s">-->
    <!--            <a href="{{ route('dsimt.admission-pitp-form') }}" class="btn">Enroll now</a>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    
<script>
    // var coverflow = $("#coverflow").flipster();
</script>


    
    
    <!-- Start About Us Area -->
    <section class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="about-left">
                        <div class="about-title align-left">
                            <span class="wow fadeInDown" data-wow-delay=".2s">About Digital Sindh</span>
                            <h1 class="wow fadeInUp fs-3" data-wow-delay=".4s">Welcome to <b>DSIMT</b>, the leading and best IT training institute in Hyderabad, Sindh.</h1>
                            <p class="wow fadeInUp" data-wow-delay=".6s" style="text-align: justify;">Are you looking for a trusted and result-driven best IT training institute in Hyderabad, Sindh?
                                Welcome to the Digital Sindh Institute of Management & Technology (DSIMT), your destination for career-oriented IT education and professional development.
                                At DSIMT, we specialize in providing industry-relevant IT courses that prepare students and professionals for real-world success. Whether you are a beginner or looking to upgrade your skills, our computer training center in Hyderabad offers flexible programs tailored to your goals.
                            </p>
                           
                            <div class="button wow fadeInUp" data-wow-delay="1s">
                                <a href="{{ route('dsimt.about-us') }}" class="btn">Explore More</a>
                            
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="about-right wow fadeInRight" data-wow-delay=".4s">
                        <img src="{{ asset('dsimt/images/carousel/wallpaper.gif') }}" width="100%" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End About Us Area -->
    
   
    <!-- Start Features Area -->
    <section class="features">
        <div class="container-fluid">
            <div class="single-head">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12 padding-zero">
                        <!-- Start Single Feature -->
                        <div class="single-feature">
                            <h3><a href="javascript:void(0)">Trending Courses</a></h3>
                            <p>"Stay Ahead of the Curve with Our Trending Courses: Elevate Your Skills and Knowledge in High-demand Fields!"</p>
                            <div class="button">
                                <a href="{{ route('courses.index') }}" class="btn">Visit Courses <i class="lni lni-arrow-right"></i></a>
                            </div>
                        </div>
                        <!-- End Single Feature -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 padding-zero">
                        <!-- Start Single Feature -->
                        <div class="single-feature">
                            <h3><a href="javascript:void(0)">Certified Faculty/Trainers</a></h3>
                            <p>"Expertly Qualified: Our Team of Certified Teachers Ensures Quality Education."</p>

                            <div class="button">
                                <a href="{{ route('dsimt.services') }}" class="btn">Meet Trainers <i class="lni lni-arrow-right"></i></a>
                            </div>
                        </div>
                        <!-- End Single Feature -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 padding-zero">
                        <!-- Start Single Feature -->
                        <div class="single-feature last">
                            <h3><a href="javascript:void(0)">Computer & Digital Lab</a></h3>
                            <p>"Unleashing Technological Potential: Welcome to Our State-of-the-Art Computer and Digital Lab"</p>
                            <div class="button">
                                <a href="#" class="btn">Explore Digital Lab<i class="lni lni-arrow-right"></i></a>
                            </div>
                        </div>
                        <!-- End Single Feature -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Features Area -->

    
    <!-- Start Services Area -->
    <section class="services section" style="">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <div class="section-icon wow zoomIn" data-wow-delay=".4s">
                            <i class="lni lni-bookmark"></i>
                        </div>
                        
                        
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">What Do We offer</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s" style="background-color: #012169; color: lightgray;border-radius: 2px;">At DSIMT, we offer more than just IT courses; we provide skill-based learning that empowers you to grow in today’s digital world. Whether you're starting your journey or upgrading your skills, our expert-led programs in web development, digital marketing, freelancing, and computer training are designed to be practical, up-to-date, and job-ready</p>
                    </div>
                </div>
            </div>
            <div class="single-head">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-service wow fadeInUp" data-wow-delay=".2s">
                            <span class="icon"><i class="lni lni-microphone"></i></span>
                            <h3><a href="javascript:void(0)">Latest Programming Languages</a></h3>
                            <p>
                                "Master the most in-demand programming languages like Python, Java, and JavaScript. Stay current with real-world coding skills and trends."</p>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-service wow fadeInUp" data-wow-delay=".4s">
                            <span class="icon"><i class="lni lni-bar-chart"></i></span>
                            <h3><a href="javascript:void(0)">Business Foundation Ideas</a></h3>
                            <p>
                                "Learn the basics of entrepreneurship. Our course helps you build smart business strategies and grow confidently as a young entrepreneur."</p>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-service wow fadeInUp" data-wow-delay=".6s">
                            <span class="icon"><i class="lni lni-investment"></i></span>
                            <h3><a href="javascript:void(0)">Industry-Level Training</a></h3>
                            <p>
                                "Gain practical, job-ready skills through real-world projects. Our hands-on training bridges the gap between classroom learning and professional success."</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Area -->



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
                        <p class="wow fadeInUp" style="background-color: #012169; color: lightgrey; border-radius: 2px;" data-wow-delay=".6s">Advance your future with our top-rated IT and computer courses designed for real-world success. Whether you're interested in web development, digital marketing, graphic design, or freelancing, DSIMT offers expert-led training with hands-on practice. Our practical programs focus on essential digital skills, from computer basics to advanced coding  helping you stay competitive in the fast-changing tech industry.</p>
                    </div>
                </div>
            </div>
            <div class="single-head">


                <div class="row">

                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Course -->

                        <div class="single-course wow fadeInUp" data-wow-delay=".2s">
                            <div class="course-image">
                                <a href="{{ route('dsimt.contact') }}"><img  src="{{ asset('dsimt/images/courses/PY-WD.jpg') }}"
                                        alt="#"></a>
                                <a href="{{ route('dsimt.contact') }}"><p class="price">Check Details</p></a>
                            </div>
                            <div class="content">
                                <h3><a href="{{ route('dsimt.contact') }}">Web Development With Python Programming</a></h3>
                               <a href="{{ route('dsimt.admission-apply') }}"> <button class="btn-sm enroll_now">Enroll Now</button> </a>
                            </div>
                            <div class="bottom-content">
                                <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li>22 Reviews</li>
                                </ul>
                                <span class="tag">
                                    <i class="lni lni-tag"></i>
                                    <a href="javascript:void(0)">Programming</a>
                                </span>
                            </div>
                        </div>

                        <!-- End Single Course -->
                    </div>


                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Course -->

                        <div class="single-course wow fadeInUp" data-wow-delay=".2s">
                            <div class="course-image">
                                <a href="{{ route('dsimt.contact') }}"><img class="image" src="{{ asset('dsimt/images/courses/CIT.jpg') }}"
                                        alt="#"></a>
                                <a href="{{ route('dsimt.contact') }}"><p class="price">Check Details</p></a>
                            </div>
                            <div class="content">
                                <h3><a href="{{ route('dsimt.contact') }}">DIT & CIT</a></h3>
                               <a href="{{ route('dsimt.admission-apply') }}"> <button class="btn-sm enroll_now">Enroll Now</button> </a>
                            </div>
                            <div class="bottom-content">
                                <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li>17 Reviews</li>
                                </ul>
                                <span class="tag">
                                    <i class="lni lni-tag"></i>
                                    <a href="javascript:void(0)">TTB Board</a>
                                </span>
                            </div>
                        </div>

                        <!-- End Single Course -->
                    </div>


                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Course -->

                        <div class="single-course wow fadeInUp" data-wow-delay=".2s">
                            <div class="course-image">
                                <a href="{{ route('dsimt.contact') }}"><img  src="{{ asset('dsimt/images/courses/AM.jpg') }}"
                                        alt="#"></a>
                                <a href="{{ route('dsimt.contact') }}"><p class="price">Check Details</p></a>
                            </div>
                            <div class="content">
                                <h3><a href="{{ route('dsimt.contact') }}">Amazon(Virtual Assistant)</a></h3>
                               <a href="{{ route('dsimt.admission-apply') }}"> <button class="btn-sm enroll_now">Enroll Now</button> </a>
                            </div>
                            <div class="bottom-content">
                                <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li>11 Reviews</li>
                                </ul>
                                <span class="tag">
                                    <i class="lni lni-tag"></i>
                                    <a href="javascript:void(0)">Marketing</a>
                                </span>
                            </div>
                        </div>

                        <!-- End Single Course -->
                    </div>


                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Course -->

                        <div class="single-course wow fadeInUp" data-wow-delay=".2s">
                            <div class="course-image">
                                <a href="{{ route('dsimt.contact') }}"><img src="{{ asset('dsimt/images/courses/WD.jpg') }}"
                                        alt="#"></a>
                                <a href="{{ route('dsimt.contact') }}"><p class="price">Check Details</p></a>
                            </div>
                            <div class="content">
                                <h3><a href="{{ route('dsimt.contact') }}">Web Development</a></h3>
                               <a href="{{ route('dsimt.admission-apply') }}"> <button class="btn-sm enroll_now">Enroll Now</button> </a>
                            </div>
                            <div class="bottom-content">
                                <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li>25 Reviews</li>
                                </ul>
                                <span class="tag">
                                    <i class="lni lni-tag"></i>
                                    <a href="javascript:void(0)">Programming</a>
                                </span>
                            </div>
                        </div>

                        <!-- End Single Course -->
                    </div>

                    
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Course -->

                        <div class="single-course wow fadeInUp" data-wow-delay=".2s">
                            <div class="course-image">
                                <a href="{{ route('dsimt.contact') }}"><img  src="{{ asset('dsimt/images/courses/DM.jpg') }}"
                                        alt="#"></a>
                                <a href="{{ route('dsimt.contact') }}"><p class="price">Check Details</p></a>
                            </div>
                            <div class="content">
                                <h3><a href="{{ route('dsimt.contact') }}">Digital Marketing</a></h3>
                               <a href="{{ route('dsimt.admission-apply') }}"> <button class="btn-sm enroll_now">Enroll Now</button> </a>
                            </div>
                            <div class="bottom-content">
                                <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li>16 Reviews</li>
                                </ul>
                                <span class="tag">
                                    <i class="lni lni-tag"></i>
                                    <a href="javascript:void(0)">Marketing</a>
                                </span>
                            </div>
                        </div>

                        <!-- End Single Course -->
                    </div>


                    
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Course -->

                        <div class="single-course wow fadeInUp" data-wow-delay=".2s">
                            <div class="course-image">
                                <a href="{{ route('dsimt.contact') }}"><img  src="{{ asset('dsimt/images/courses/GD.jpg') }}"
                                        alt="#"></a>
                                <a href="{{ route('dsimt.contact') }}"><p class="price">Check Details</p></a>
                            </div>
                            <div class="content">
                                <h3><a href="{{ route('dsimt.contact') }}">Graphic Design</a></h3>
                               <a href="{{ route('dsimt.admission-apply') }}"> <button class="btn-sm enroll_now">Enroll Now</button> </a>   
                            </div>
                            <div class="bottom-content">
                                <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li>23 Reviews</li>
                                </ul>
                                <span class="tag">
                                    <i class="lni lni-tag"></i>
                                    <a href="javascript:void(0)">Designing</a>
                                </span>
                            </div>
                        </div>

                        <!-- End Single Course -->
                    </div>
                 <div style="text-align: center;">
                    
                    <hr>
                    <a href="{{ route('courses.index') }}">
                        <button class="load_more btn">
                            Load more courses
                      </button>
                     
                    </a>
                    
                 </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Courses Area -->

    


    <!-- Start Achivement Area -->
    <section class="our-achievement section overlay">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <div class="section-icon wow zoomIn" data-wow-delay=".4s">
                            <i class="lni lni-bookmark"></i>
                        </div>
                        <h2 class="wow fadeInUp text-white" data-wow-delay=".4s">Our Achievments</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s" style="color: #012169; background-color: orange; border-radius: 2px;">At Digital Sindh Institute of Management & Technology (DSIMT), our achievements reflect our dedication to quality IT training and student success. From producing skilled professionals in web development, digital marketing, and computer courses, to helping hundreds launch freelancing careers  our results speak for themselves. Join a growing community that’s turning knowledge into real opportunities.</p>
                    </div>
                </div>
            </div>
          

            <div class="row">
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="single-achievement wow fadeInUp" data-wow-delay=".2s">
                        <h3 class="counter"><span id="secondo1" class="countup" cup-end="500">500</span>+</h3>
                        <h4>Happy Clients</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="single-achievement wow fadeInUp" data-wow-delay=".4s">
                        <h3 class="counter"><span id="secondo2" class="countup" cup-end="90">95</span>+</h3>
                        <h4>Job Oriented</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="single-achievement wow fadeInUp" data-wow-delay=".6s">
                        <h3 class="counter"><span id="secondo3" class="countup" cup-end="100">100</span>%</h3>
                        <h4>Satisfaction</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="single-achievement wow fadeInUp" data-wow-delay=".6s">
                        <h3 class="counter"><span id="secondo3" class="countup" cup-end="100">100%</span>%</h3>
                        <h4>Support</h4>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <!-- End Achivement Area -->



    <!-- Start Events Area-->
    <section class="events section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <div class="section-icon wow zoomIn" data-wow-delay=".4s">
                            <i class="lni lni-bookmark"></i>
                        </div>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Events and Celebrations</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s" style="color: lightgray; background-color: #012169; border-radius: 2px;">Step into a dynamic world of inspiration at Digital Sindh Institute of Management & Technology (DSIMT). Our events aren’t just gatherings, they're gateways to growth. From interactive workshops on web development, digital marketing, and freelancing, to expert-led seminars, career expos, and student recognition ceremonies, each experience is designed to expand your knowledge, build connections, and celebrate success in the world of technology.</p>
                    </div>
                </div>
            </div>


            <div class="row">
                
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Event -->
                    <div class="single-event wow fadeInUp" data-wow-delay=".2s">
                        <div class="event-image">
                            <a href="{{ route('dsimt.events') }}"><img src="{{ asset('dsimt/images/dsimt_imgs/Annual.jpg') }}" alt="#"></a>
                            <p class="date">23<span>SEPT</span><span>2024</span></p>
                        </div>
                        <div class="content">
                            <h3><a href="{{ route('dsimt.events') }}">Excellence Annual Ceremony</a></h3>
                      
                            </div>
                        <div class="bottom-content">
                            <a class="speaker" href="javascript:void(0)">
                                <img src="{{ asset('dsimt/images/dsimt_imgs/news.jpg') }}" alt="#">
                                <span>Dr.Mukhtiar Ali Unar</span>
                            </a>
                            <span class="time">
                                <i class="lni lni-timer"></i>
                                <a href="javascript:void(0)">12.00pm - 6.00pm</a>
                            </span>
                        </div>
                    </div>
                    <!-- End Single Event -->
                </div>
                

                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Event -->
                    <div class="single-event wow fadeInUp" data-wow-delay=".2s">
                        <div class="event-image">
                            <a href="{{ route('dsimt.events') }}"><img src="{{ asset('dsimt/images/dsimt_imgs/CD.jpg') }}" alt="#"></a>
                            <p class="date">23<span>SEPT</span><span>2024</span></p>
                        </div>
                        <div class="content">
                            <h3><a href="{{ route('dsimt.events') }}">Certificate Distribution Ceremony</a></h3>
                        </div>
                        <div class="bottom-content">
                            <a class="speaker" href="javascript:void(0)">
                                <img src="{{ asset('dsimt/images/dsimt_imgs/chief.jpg') }}" alt="#">
                                <span>Syed Irfan Ali Shah</span>
                            </a>
                            <span class="time">
                                <i class="lni lni-timer"></i>
                                <a href="javascript:void(0)">2.00pm - 4.00pm</a>
                            </span>
                        </div>
                    </div>
                    <!-- End Single Event -->
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Event -->
                    <div class="single-event wow fadeInUp" data-wow-delay=".4s">
                        <div class="event-image">
                            <a href="{{ route('dsimt.events') }}"><img class="image" src="{{ asset('dsimt/images/galary/pic1.JPG') }}" alt="#"></a>
                            <p class="date">29<span>MAY</span><span>2024</span></p>
                        </div>
                        <div class="content">
                            <h3><a href="{{ route('dsimt.events') }}">Birthday Wonderland for C.E.O of DSIMT</a></h3>
                        
                            </div>
                        <div class="bottom-content">
                            <a class="speaker" href="javascript:void(0)">
                                <img src="{{ asset('dsimt/images/dsimt_imgs/lutuf.jpg') }}" alt="#">
                                <span>Lutuf Ali Junejo</span>
                            </a>
                            <span class="time">
                                <i class="lni lni-timer"></i>
                                <a href="javascript:void(0)">08.00pm - 10.00pm</a>
                            </span>
                        </div>
                    </div>
                    <!-- End Single Event -->
                </div>
                <div style="text-align: center;">
                    
                    <hr>
                    <a href="{{ route('dsimt.events') }}">
                        <button class="load_more btn">
                            Load more events
                      </button>
                     
                    </a>
                    
                 </div>
            </div>
        </div>
    </section>
    <!-- End Events Area-->


    <!-- Start Teachers -->
    <section id="teachers" class="teachers section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title align-center gray-bg">
                        <div class="section-icon wow zoomIn" data-wow-delay=".4s">
                            <i class="lni lni-users"></i>
                        </div>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Our Experienced Trainers</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s" style="color: lightgray;background-color: #012169;border-radius: 2px;">At Digital Sindh Institute of Management & Technology (DSIMT), our strength lies in our skilled and passionate trainers. With real-world experience in web development, digital marketing, graphic design, and freelancing, our instructors bring hands-on knowledge straight to the classroom.</p>
                    </div>
                </div>
            </div>
            <div class="row">

                <!-- Single Team -->
                <!--<div class="col-lg-6 col-md-6 col-12">-->
                <!--    <div class="single-team wow fadeInUp" data-wow-delay=".2s">-->
                <!--        <div class="row">-->
                <!--            <div class="col-lg-5 col-12">-->
                                <!-- Image -->
                <!--                <div class="image">-->
                <!--                    <img src="{{ asset('dsimt/images/team/lutuf.jpg') }}" alt="#Lutuf Ali Junejo">-->
                <!--                </div>-->
                                <!-- End Image -->
                <!--            </div>-->
                <!--            <div class="col-lg-7 col-12">-->
                <!--                <div class="info-head">-->
                                    <!-- Info Box -->
                <!--                    <div class="info-box">-->
                <!--                        <span class="designation">Master Trainer</span>-->
                <!--                        <h4 class="name"><a href="teacher-details.html">Lutuf Ali Junejo</a></h4>-->
                <!--                    </div>-->
                                    <!-- End Info Box -->
                                    <!-- Social -->
                <!--                    <ul class="social">-->
                <!--                        <li><a href="https://web.facebook.com/lutifjan.junejo"><i class="lni lni-facebook-filled"></i></a></li>-->
                <!--                        <li><a href="lutifalij@gmail.com"><i class="-"></i></a></li>-->
                <!--                        <li><a href="https://www.linkedin.com/in/lutuf-junejo-448999195/"><i class="lni lni-linkedin-original"></i></a></li>-->
                <!--                        <li><a href="https://www.instagram.com/lutufalij/"><i class="lni lni-instagram-original"></i></a></li>-->
                                        
                <!--                    </ul>-->
                                    <!-- End Social -->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-team wow fadeInUp" data-wow-delay=".4s">
                        <div class="row">
                            <div class="col-lg-5 col-12">
                                <!-- Image -->
                                <div class="image">
                                    <img src="{{ asset('dsimt/images/team/shafique.jpg') }}" alt="#">
                                </div>
                                <!-- End Image -->
                            </div>
                            <div class="col-lg-7 col-12">
                                <div class="info-head">
                                    <!-- Info Box -->
                                    <div class="info-box">
                                        <span class="designation">C.E.O</span>
                                        <h4 class="name"><a href="teacher-details.html">Shafique Ahmed Unar</a></h4>
                                    </div>
                                    <!-- End Info Box -->
                                    <!-- Social -->
                                    <ul class="social">
                                        <li><a href="https://web.facebook.com/shafique.ahmed.501"><i class="lni lni-facebook-filled"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-behance-original"></i></a></li>
                                    </ul>
                                    <!-- End Social -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Team -->


                <!-- Single Team -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-team wow fadeInUp" data-wow-delay=".4s">
                        <div class="row">
                            <div class="col-lg-5 col-12">
                                <!-- Image -->
                                <div class="image">
                                    <img src="{{ asset('dsimt/images/team/sanjay.jpg') }}" alt="#">
                                </div>
                                <!-- End Image -->
                            </div>
                            <div class="col-lg-7 col-12">
                                <div class="info-head">
                                    <!-- Info Box -->
                                    <div class="info-box">
                                        <span class="designation">SEO Expert</span>
                                        <h4 class="name"><a href="teacher-details.html">Sanjay Kessrani</a></h4>
                                    </div>
                                    <!-- End Info Box -->
                                    <!-- Social -->
                                    <ul class="social">
                                        <li><a href="https://web.facebook.com/sanjaykessrani9"><i class="lni lni-facebook-filled"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                        <li><a href="https://www.linkedin.com/in/sanjaykessrani/"><i class="lni lni-linkedin-original"></i></a></li>
                                        <li><a href="https://www.instagram.com/sanjaykessrani/"><i class="lni lni-instagram-original"></i></a></li>
                                    </ul>
                                    <!-- End Social -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Team -->
                 
                
                
                <!-- Single Team -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-team wow fadeInUp" data-wow-delay=".4s">
                        <div class="row">
                            <div class="col-lg-5 col-12">
                                <!-- Image -->
                                <div class="image">
                                    <img src="{{ asset('dsimt/images/team/shahzad.jpeg') }}" alt="#">
                                </div>
                                <!-- End Image -->
                            </div>
                            <div class="col-lg-7 col-12">
                                <div class="info-head">
                                    <!-- Info Box -->
                                    <div class="info-box">
                                        <span class="designation">IT Trainer / Lab-Assitant</span>
                                        <h4 class="name"><a href="teacher-details.html">Shahzad Gul</a></h4>
                                    </div>
                                    <!-- End Info Box -->
                                    <!-- Social -->
                                    <ul class="social">
                                        <li><a href="https://www.facebook.com/shahzad.gul.5220"><i class="lni lni-facebook-filled"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                        <li><a href="https://www.linkedin.com/in/shahzad-gul-b087a8156/"><i class="lni lni-linkedin-original"></i></a></li>
                                        <li><a href="https://www.instagram.com/shahzadgul60/"><i class="lni lni-instagram-original"></i></a></li>
                                    </ul>
                                    <!-- End Social -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Team -->
                 

                
                <!-- Single Team -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-team wow fadeInUp" data-wow-delay=".4s">
                        <div class="row">
                            <div class="col-lg-5 col-12">
                                <!-- Image -->
                                <div class="image">
                                    <img src="{{ asset('dsimt/images/team/Miss-Malook.jpeg') }}" alt="#">
                                </div>
                                <!-- End Image -->
                            </div>
                            <div class="col-lg-7 col-12">
                                <div class="info-head">
                                    <!-- Info Box -->
                                    <div class="info-box">
                                        <span class="designation">Graphic Designer</span>
                                        <h4 class="name"><a href="teacher-details.html">Malook Zadi</a></h4>
                                    </div>
                                    <!-- End Info Box -->
                                    <!-- Social -->
                                    <ul class="social">
                                        <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-behance-original"></i></a></li>
                                    </ul>
                                    <!-- End Social -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Team -->
                
                <!-- Single Team -->
                <!--<div class="col-lg-6 col-md-6 col-12">-->
                <!--    <div class="single-team wow fadeInUp" data-wow-delay=".4s">-->
                <!--        <div class="row">-->
                <!--            <div class="col-lg-5 col-12">-->
                                <!-- Image -->
                <!--                <div class="image">-->
                <!--                    <img src="{{ asset('dsimt/images/team/Gorav.jpeg') }}" alt="#">-->
                <!--                </div>-->
                                <!-- End Image -->
                <!--            </div>-->
                <!--            <div class="col-lg-7 col-12">-->
                <!--                <div class="info-head">-->
                                    <!-- Info Box -->
                <!--                    <div class="info-box">-->
                <!--                        <span class="designation">Web Developer & Designer</span>-->
                <!--                        <h4 class="name"><a href="teacher-details.html">Gorav Narwani</a></h4>-->
                <!--                    </div>-->
                                    <!-- End Info Box -->
                                    <!-- Social -->
                <!--                    <ul class="social">-->
                <!--                        <li><a href="https://www.facebook.com/gorav.narwani.2025?rdid=JaoSEmt2qMnBB4zG&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F1BCHejkrVz%2F#"><i class="lni lni-facebook-filled"></i></a></li>-->
                <!--                        <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>-->
                <!--                        <li><a href="https://www.linkedin.com/in/gorav-narwani-360308229/?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i class="lni lni-linkedin-original"></i></a></li>-->
                <!--                        <li><a href="https://www.instagram.com/gorav7846?utm_source=qr&igsh=d2d3NjJsdWN3anMw"><i class="lni lni-instagram-original"></i></a></li>-->
                <!--                    </ul>-->
                                    <!-- End Social -->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!-- End Single Team -->
                

                
                <div style="text-align: center;">
                    
                    <hr>
                    <a href="{{ route('dsimt.services') }}">
                        <button class="load_more btn">
                            Find more trainers
                      </button>
                     
                    </a>
                    
                 </div>

            </div>
        </div>
    </section>
    <!--/ End Teachers Area -->


   

    <!-- Start Testimonials Area -->
    <section class="testimonials section">
        <div class="container testimonial_container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title align-center gray-bg">
                        <div class="section-icon wow zoomIn" data-wow-delay=".4s">
                            <i class="lni lni-quotation"></i>
                        </div>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">What Our Students Say</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s" style="background-color: #012169; color: lightgray; border-radius: 2px;">Our students are the true reflection of our impact. At Digital Sindh Institute of Management & Technology (DSIMT), they’ve gained practical digital skills, built strong portfolios, and stepped confidently into careers and freelancing. From mastering computer courses to launching freelance businesses, hear how DSIMT has transformed lives through quality IT training and mentorship.</b>.</p>
                    </div>
                </div>
            </div>
            <div class="row testimonial-slider">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Testimonial -->
                    <div class="single-testimonial">
                        <div class="text">
                            <p>"It's incredible how much simpler it has become to meet new people and form instant connections. My personality hasn't changed; only my mindset and a few behaviors have."</p>
                        </div>
                        <div class="author">
                            <img src="{{ asset('dsimt/images/testimonials/zaheer.jpg') }}" alt="#">
                            <h4 class="name">
                                Zaheer Ali Buriro
                                <span class="deg">Web Development</span>
                                <span class="deg">Student</span>
                                
                            </h4>
                        </div>
                    </div>
                    <!-- End Single Testimonial -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Testimonial -->
                    <div class="single-testimonial">
                        <div class="text">
                            <p>"It's remarkable how much easier it has become to meet new people and make instant connections. My personality remains the same; the only changes are in my mindset and a few behaviors."</p>
                        </div>
                        <div class="author">
                            <img src="{{ asset('dsimt/images/testimonials/shakeel.jpg') }}" alt="#">
                            <h4 class="name">
                                Shakeel Akbar 
                                <span class="deg">Web Development</span>
                                <span class="deg">Student</span>
                                
                            </h4>
                        </div>
                    </div>
                    <!-- End Single Testimonial -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Testimonial -->
                    <div class="single-testimonial">
                        <div class="text">
                            <p>"It's astonishing how much easier it is to meet new people and form instant connections. My personality is unchanged; what's different is my mindset and a few behaviors."</p>
                        </div>
                        <div class="author">
                            <img src="{{ asset('dsimt/images/st/fayaz.jpg') }}" alt="#">
                            <h4 class="name">
                                Fayyaz Ahmed Soomro
                                <span class="deg">Python Student</span>
                            </h4>
                        </div>
                    </div>
                    <!-- End Single Testimonial -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Testimonial -->
                    <div class="single-testimonial">
                        <div class="text">
                            <p>"It's surprising how much simpler it is to meet new people and build instant connections. My personality hasn't changed; the difference lies in my mindset and a few behaviors."</p>
                        </div>
                        <div class="author">
                            <img src="{{ asset('dsimt/images/st/mashoq.jpg') }}" alt="#">
                            <h4 class="name">
                                Mashooque Ali Jamali
                                <span class="deg">Web Student</span>
                            </h4>
                        </div>
                    </div>
                    <!-- End Single Testimonial -->
                </div>

                
               
              
            </div>
        </div>
    </section>
    <!-- End Testimonial Area -->

    <!-- Start Call To Career-->
    <section class="call-action section overlay">
        <div class="container">
            <div class="row ">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                    <div class="call-content">
                        <span>GET INSTANT ACCESS FOR FREE COUNSELING</span>
                        <h2>Career Compass: Your Path to Success</h2>
                        <p> Not sure where to start? Let our experts at DSIMT guide you. Get free career counseling to explore the right IT courses based on your goals and interests whether it's web development, digital marketing, or freelancing. Start building a future with confidence and clarity.</p>
                        <div class="button">
                            <a href="{{ route('dsimt.contact') }}" class="btn">Join Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Call To Action Area -->
    
    <!-- Start Clients Area -->
    <div class="client-logo-section">
        <div class="container">
            <div class="client-logo-wrapper">
                <div class="client-logo-carousel d-flex align-items-center justify-content-between">
                    <div class="client-logo">
                        <img src="{{ asset('dsimt/images/clients/ttb.png') }}" alt="">
                    </div>
                    <div class="client-logo">
                        <img src="{{ asset('dsimt/images/clients/bbsydp.png') }}" alt="">
                    </div>
                    <div class="client-logo">
                        <img src="{{ asset('dsimt/images/clients/ttb.png') }}" alt="">
                    </div>
                    <div class="client-logo">
                        <img src="{{ asset('dsimt/images/clients/navttc.png') }}" alt="">
                    </div>
                    <div class="client-logo">
                        <img src="{{ asset('dsimt/images/clients/stevta.png') }}" alt="">
                    </div>
                    <div class="client-logo">
                        <img src="{{ asset('dsimt/images/clients/sindh.png') }}" alt="">
                    </div>
                    <div class="client-logo">
                        <img src="{{ asset('dsimt/images/clients/IT.png') }}" alt="">
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End Clients Area -->


   


    <!-- Start Contact Area -->
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="row g-4">
                <div class="col-12">
                    <div class="section-title align-center gray-bg">
                        <div class="section-icon wow zoomIn" data-wow-delay=".4s">
                            <i class="lni lni-envelope"></i>
                        </div>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Contact Us</h2>
                        <p class="wow fadeInUp contact-intro" data-wow-delay=".6s">Have questions about our IT training programs, computer courses, or enrollment process? Connect with the DSIMT team today! Whether you're a student, parent, or professional, we’re ready to assist you with guidance, support, or partnership opportunities.</p>
                    </div>
                </div>
                <div class="col-lg-8 col-12">
                    <div class="form-main">
                        <h3 class="title"><span>Ready to Start?</span> Let's Talk</h3>
                        <form class="form" method="post" action="#">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Your Name</label>
                                        <input name="name" type="text" placeholder="Enter your name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Your Subject</label>
                                        <input name="subject" type="text" placeholder="Subject of your inquiry" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Your Email Address</label>
                                        <input name="email" type="email" placeholder="your@email.com" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Your Phone Number</label>
                                        <input name="phone" type="tel" placeholder="+92 300 1234567" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group message">
                                        <label>Your Message</label>
                                        <textarea name="message" placeholder="How can we help you?" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group button">
                                        <button type="submit" class="btn">Submit Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="contact-info mt-lg-0">
                        <!-- Start Single Info -->
                        <div class="single-info">
                            <i class="lni lni-map-marker"></i>
                            <h4>Visit Our Office</h4>
                            <p class="no-margin-bottom">
                                House no B-88 near the post office, opp Govt Girls School Phase-1 Qasimabad, Hyderabad, Pakistan
                            </p>
                            <a href="https://www.google.com/maps/place/Digital+sindh+Institute+of+Managment+%26+Technology" target="_blank" rel="noopener noreferrer" class="contact-link">Get directions <i class="lni lni-arrow-right"></i></a>
                        </div>
                        <!-- End Single Info -->
                        <!-- Start Single Info -->
                        <div class="single-info">
                            <i class="lni lni-phone"></i>
                            <h4>Let's Talk</h4>
                            <p class="no-margin-bottom">
                                <a href="tel:+923060934322">Mobile: (+92) 306 0934322</a><br>
                                <a href="tel:0226138792">Phone: 022-6138792</a>
                            </p>
                        </div>
                        <!-- End Single Info -->
                        <!-- Start Single Info -->
                        <div class="single-info">
                            <i class="lni lni-envelope"></i>
                            <h4>E-mail Us</h4>
                            <p class="no-margin-bottom">
                                <a href="mailto:digitalsindhimt@gmail.com">digitalsindhimt@gmail.com</a>
                            </p>
                        </div>
                        <!-- End Single Info -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Contact Area -->

    <!-- Start Google-map Area -->
    <div class="map-section">
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3604.264103252153!2d68.357776!3d25.395968699999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x394c7b97266a2801%3A0xfb9646c0252e07a6!2sDigital%20sindh%20Institute%20of%20Managment%20%26%20Technology!5e0!3m2!1sen!2s!4v1718129677020!5m2!1sen!2s" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
            </div>
        </div>
    </div>
    <!-- End Google-map Area -->
@endsection
