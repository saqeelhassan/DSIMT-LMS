@extends('main-website.layouts.main')

@section('title', 'Page Not Found | Digital Sindh Institute')
@section('description', 'Page not found.')

@section('content')
<!-- Preloader -->
<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>

<!-- Start Error Area -->
<div class="error-area">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="error-content">
                    <h1>404</h1>
                    <h2>Oops! That page can't be found</h2>
                    <p>The page you are looking for it maybe deleted</p>
                    <div class="button">
                        <a href="{{ route('index') }}" class="btn">Go To Home</a>
                        <a href="{{ route('dsimt.contact') }}" class="btn alt">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Error Area -->

<script>
    window.onload = function () {
        window.setTimeout(fadeout, 500);
    }
    function fadeout() {
        var preloader = document.querySelector('.preloader');
        if (preloader) {
            preloader.style.opacity = '0';
            preloader.style.display = 'none';
        }
    }
</script>
@endsection
