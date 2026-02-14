@extends('main-website.layouts.main')

@section('title', 'Merit Internships | Digital Sindh Institute')
@section('description', 'Merit internships.')

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
                        
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Internship Programs and Career Opportunities</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Course -->

                    <div class="single-course wow fadeInUp" data-wow-delay=".2s">
                        <div class="course-image">
                            <a href="javascript:void(0)"><img  src="{{ asset('dsimt/images/career/collective_intern.jpg') }}"
                                    alt="#"></a>
                            
                        </div>
                        <div class="content">
                            <h3><a href="javascript:void(0)">Internship for Following Positions</a></h3>
                           <a href="{{ route('dsimt.contact') }}"><button class="btn-sm enroll_now">Apply Now</button> </a>   
                        </div>
                        <div class="bottom-content">
                            <span class="tag">
                                <i class="lni lni-tag"></i>
                                <a href="javascript:void(0)">Internships</a>
                            </span>
                        </div>
                    </div>

                    <!-- End Single Course -->
                </div>


                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Course -->

                    <div class="single-course wow fadeInUp" data-wow-delay=".2s">
                        <div class="course-image">
                            <a href="javascript:void(0)"><img  src="{{ asset('dsimt/images/career/graphic_intern.jpg') }}"
                                    alt="#"></a>
                            
                        </div>
                        <div class="content">
                            <h3><a href="">Internship for Graphic Design</a></h3>
                            
                            <a href="{{ route('dsimt.contact') }}"><button class="btn-sm enroll_now">Apply Now</button> </a>   
                        </div>
                        <div class="bottom-content">
                            
                            <span class="tag">
                                
                                
                                <i class="lni lni-tag"></i>
                                <a href="javascript:void(0)">Internships</a>

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
