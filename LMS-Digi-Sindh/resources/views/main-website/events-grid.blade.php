@extends('main-website.layouts.main')

@section('title', 'Events | Digital Sindh Institute')
@section('description', 'Events.')

@section('content')
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
                        <p class="wow fadeInUp" data-wow-delay=".6s" style="color: lightgray; background-color: #012169; border-radius: 2px;">Stay ahead of the curve with Digital Sindh's upcoming events. Explore cutting-edge tech trends, network with industry leaders, and elevate your digital skills.</p>
                    </div>
                </div>
            </div>


            <div class="row">
                
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Event -->
                    <div class="single-event wow fadeInUp" data-wow-delay=".2s">
                        <div class="event-image">
                            <a href="javascript:void(0)"><img src="{{ asset('dsimt/images/dsimt_imgs/inaug.jpg') }}" alt="#"></a>
                            <p class="date">1<span>SEPT</span><span>2023</span></p>
                        </div>
                        <div class="content">
                            <h3><a href="javascript:void(0)">Grand Opening Ceremony</a></h3>
                      
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
                            <a href="javascript:void(0)"><img src="{{ asset('dsimt/images/dsimt_imgs/wall2.jpg') }}" alt="#"></a>
                            <p class="date">11<span>FEB</span><span>2024</span></p>
                        </div>
                        <div class="content">
                            <h3><a href="javascript:void(0)">Certificate Distribution Ceremony</a></h3>
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
                    <div class="single-event wow fadeInUp" data-wow-delay=".2s">
                        <div class="event-image">
                            <a href="javascript:void(0)"><img style="height: 250px; width: 400px;" src="{{ asset('dsimt/images/events/cricket.jpg') }}" alt="#"></a>

                            <p class="date">28<span>March</span><span>2024</span></p>
                        </div>
                        <div class="content">
                            <h3><a href="javascript:void(0)">Night Cricket Tournament of Digital Sindh</a></h3>
                        </div>
                        <div class="bottom-content">
                            <a class="speaker" href="javascript:void(0)">
                                <img src="{{ asset('dsimt/images/events/cricket.jpg') }}" alt="#">
                                
                            </a>
                            <span class="time">
                                <i class="lni lni-timer"></i>
                                <a href="javascript:void(0)">9:00pm - 3:00am</a>
                            </span>
                        </div>
                    </div>
                    <!-- End Single Event -->
                </div>


                

                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Event -->
                    <div class="single-event wow fadeInUp" data-wow-delay=".4s">
                        <div class="event-image">
                            <a href="javascript:void(0)"><img class="image" src="{{ asset('dsimt/images/events/shafique.JPG') }}" alt="#"></a>
                            <p class="date">29<span>May</span><span>2024</span></p>
                        </div>
                        <div class="content">
                            <h3><a href="javascript:void(0)">Birthday Celebration of the CEO of Digital Sindh Sir Shafique Ahmed Unar </a></h3>
                        
                            </div>
                        <div class="bottom-content">
                            <a class="speaker" href="javascript:void(0)">
                                <img src="{{ asset('dsimt/images/dsimt_imgs/ceo.png') }}" alt="#">
                                <span>Shafique Ahmed Unar</span>
                            </a>
                            <span class="time">
                                <i class="lni lni-timer"></i>
                                <a href="javascript:void(0)">09:00pm - 11:00pm</a>
                            </span>
                        </div>
                    </div>
                    <!-- End Single Event -->
                </div>




                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Event -->
                    <div class="single-event wow fadeInUp" data-wow-delay=".4s">
                        <div class="event-image">
                            <a href="javascript:void(0)"><img class="image" src="{{ asset('dsimt/images/dsimt_imgs/bd.jpg') }}" alt="#"></a>
                            <p class="date">05<span>Jan</span><span>2024</span></p>
                        </div>
                        <div class="content">
                            <h3><a href="javascript:void(0)">Birthday Wonderland for Sir Lutuf Ali Junejo</a></h3>
                        
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



                
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Event -->
                    <div class="single-event wow fadeInUp" data-wow-delay=".4s">
                        <div class="event-image">
                            <a href="javascript:void(0)"><img class="image" src="{{ asset('dsimt/images/events/Trip Anouncement.png') }}" alt="#"></a>
                            <p class="date">26<span>May</span><span>2024</span></p>
                        </div>
                        <div class="content">
                            <h3><a href="javascript:void(0)">Karachi Study Tour</a></h3>
                        
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
@endsection
