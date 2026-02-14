@extends('main-website.layouts.main')

@section('title', 'Coming Soon | Digital Sindh Institute')
@section('description', 'Coming soon.')

@section('content')
<!-- Start Services Area -->
    <section class="services section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <div class="section-icon wow zoomIn" data-wow-delay=".4s">
                            <i class="lni lni-bookmark"></i>
                        </div>
                        
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Stay in Touch With Us</h2>
                    </div>
                </div>
            </div>

            <div class="single-head">
                <div class="row">
                    <center>
                    <img style="height: 400px; width: auto" src="{{ asset('dsimt/images/career/comingsoon.jpg') }}" alt="">
                </center>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Area -->
@endsection
