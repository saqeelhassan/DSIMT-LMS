@extends('main-website.layouts.main')

@section('title', 'Gallery | Digital Sindh Institute')
@section('description', 'Gallery.')

@section('content')
<!-- Start Breadcrumbs -->
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Our Gallery</h1>
                        <p>
                            "Discover the best gallery at Digital Sindh Institute of Management & Technology, showcasing innovative projects and creative works by our talented students and faculty."
                        </p>
                    </div>
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li>Our Gallery</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Photo Gallery -->
    <div class="photo-gallery section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title align-center">
                        <span class="wow zoomIn" data-wow-delay="0.2s">Gallery of DSIMT</span>
                   
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <main id="gallery">
                        <div class="main-img">
                            <img style="height: 600px;" src="{{ asset('dsimt/images/galary/pic1.JPG') }}" id="current" alt="#">
                        </div>
                        <div class="images">
                            <img src="{{ asset('dsimt/images/galary/pic2.JPG') }}" class="img" alt="#">
                            <img src="{{ asset('dsimt/images/galary/pic3.JPG') }}" class="img" alt="#">
                            <img src="{{ asset('dsimt/images/galary/pic4.JPG') }}" class="img" alt="#">
                            <img src="{{ asset('dsimt/images/galary/pic5.JPG') }}" class="img" alt="#">
                            <img src="{{ asset('dsimt/images/galary/pic7.jpeg') }}" class="img" alt="#">
                            <img src="{{ asset('dsimt/images/galary/pic8.jpeg') }}" class="img" alt="#">
                            <img src="{{ asset('dsimt/images/galary/pic10.jpg') }}" class="img" alt="#">
                            <img src="{{ asset('dsimt/images/galary/pic11.jpg') }}" class="img" alt="#">
                            <img src="{{ asset('dsimt/images/galary/pic12.jpg') }}" class="img" alt="#">
                        </div>
                    </main>
                </div>
     
            </div>
            
            <div style="text-align: center;">

                <hr>
                <a href="{{ route('dsimt.gallery') }}">
                    <button class="load_more btn">
                        Find More Photos
                    </button>

                </a>

            </div>
            
        </div>
    </div>
    <!-- End Photo Gallery -->
@endsection
