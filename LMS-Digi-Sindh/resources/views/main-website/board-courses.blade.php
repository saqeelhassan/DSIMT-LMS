@extends('main-website.layouts.main')

@section('title', 'Board Courses | Digital Sindh Institute')
@section('description', 'Board courses.')

@section('content')
@php
    $lmsCourses = $lmsCourses ?? collect();
    $enrollLoginUrl = function ($courseName) use ($lmsCourses) {
        $course = $lmsCourses->get($courseName);
        $params = ['intended' => route('dashboard')];
        if ($course) { $params['enroll_course'] = $course->id; }
        return route('login', $params);
    };
@endphp
<!-- Start Events Area-->
<section class="courses section grid-page">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <div class="section-icon wow zoomIn" data-wow-delay=".4s">
                            <i class="lni lni-bookmark"></i>
                        </div>
                        
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Board Registered Courses</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Course -->

                    <div class="single-course wow fadeInUp" data-wow-delay=".2s">
                        <div class="course-image">
                            <a href="javascript:void(0)"><img  src="{{ asset('dsimt/images/courses/TTD.jpg') }}"
                                    alt="#"></a>
                            <a href="javascript:void(0)"><p class="price">Check Details</p></a>
                        </div>
                        <div class="content">
                            <h3><a href="javascript:void(0)">Diploma in Information Technology</a></h3>
                           <a href="{{ $enrollLoginUrl('Diploma in Information Technology') }}"> <button class="btn-sm enroll_now">Enroll Now</button> </a>   
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
                            <a href="javascript:void(0)"><img  src="{{ asset('dsimt/images/courses/NAVTTC.jpg') }}"
                                    alt="#"></a>
                            <a href="javascript:void(0)"><p class="price">Check Details</p></a>
                        </div>
                        <div class="content">
                            <h3><a href="javascript:void(0)">Mobile Application Development</a></h3>
                            <button class="btn-sm enroll_now badge bg-danger">Date Expired</button>    
                        </div>
                        <div class="bottom-content">
                            
                            <span class="tag">
                                
                                
                                <i class="lni lni-tag"></i>
                                <a href="javascript:void(0)">NAVTTC Course</a>

                            </span>
                        </div>
                    </div>

                    <!-- End Single Course -->
                </div>


                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Course -->

                    <div class="single-course wow fadeInUp" data-wow-delay=".2s">
                        <div class="course-image">
                            <a href="javascript:void(0)"><img  src="{{ asset('dsimt/images/courses/BB.jpg') }}"
                                    alt="#"></a>
                            <a href="javascript:void(0)"><p class="price">Check Details</p></a>
                        </div>
                        <div class="content">
                            <h3><a href="javascript:void(0)">Certificate in Information Technology</a></h3>
                            <button class="btn-sm enroll_now badge bg-warning">Date Postponed</button>
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
                                <a href="javascript:void(0)">TTB Board</a>
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
