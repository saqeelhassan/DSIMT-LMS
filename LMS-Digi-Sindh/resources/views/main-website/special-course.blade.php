@extends('main-website.layouts.main')

@section('title', 'Special Courses | Digital Sindh Institute')
@section('description', 'Special courses.')

@section('content')
<!-- Start Events Area-->
<section class="courses section grid-page">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <div class="section-icon wow zoomIn" data-wow-delay=".4s">
                            <i class="lni lni-bookmark"></i>
                        </div>
                        
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Special & Crash Courses</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Course -->

                    <div class="single-course wow fadeInUp" data-wow-delay=".2s">
                        <div class="course-image">
                            <a href="javascript:void(0)"><img  src="{{ asset('dsimt/images/courses/python.jpg') }}"
                                    alt="#"></a>
                            <a href="javascript:void(0)"><p class="price">Check Details</p></a>
                        </div>
                        <div class="content">
                            <h3><a href="javascript:void(0)">Web Development Crash Course</a></h3>
                           <!--<a href="{{ route('dsimt.contact') }}"> <button class="btn-sm enroll_now">Enroll Now</button> </a>   -->
                           <button class="btn-sm enroll_now badge bg-danger">Date Expired</button>   
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
                            <a href="javascript:void(0)"><img  src="{{ asset('dsimt/images/courses/Scholarship.jpg') }}"
                                    alt="#"></a>
                            <a href="javascript:void(0)"><p class="price">Check Details</p></a>
                        </div>
                        <div class="content">
                            <h3><a href="javascript:void(0)">Graphic Design Crash Course</a></h3>
                            <button class="btn-sm enroll_now badge bg-danger">Date Expired</button>    
                        </div>
                        <div class="bottom-content">
                            
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li>18 Reviews</li>
                            </ul>
                            <span class="tag">
                                
                                
                                <i class="lni lni-tag"></i>
                                <a href="javascript:void(0)">Editing</a>

                            </span>
                        </div>
                    </div>

                    <!-- End Single Course -->
                </div>


                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Course -->

                    <div class="single-course wow fadeInUp" data-wow-delay=".2s">
                        <div class="course-image">
                            <a href="javascript:void(0)"><img  src="{{ asset('dsimt/images/courses/crush.jpg') }}"
                                    alt="#"></a>
                            <a href="javascript:void(0)"><p class="price">Check Details</p></a>
                        </div>
                        <div class="content">
                            <h3><a href="javascript:void(0)">Summer Special Courses</a></h3>
                          <!--<a href="{{ route('dsimt.contact') }}">  <button class="btn-sm enroll_now">Enroll Now</button> </a>   -->
                          <button class="btn-sm enroll_now badge bg-danger">Date Expired</button>   
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
                                <a href="javascript:void(0)">Programming & Design</a>
                            </span>
                        </div>
                    </div>

                    <!-- End Single Course -->
                </div>


                

                
            </div>
        </div>
        
    </section>
    <!-- End Events Area-->
@endsection
