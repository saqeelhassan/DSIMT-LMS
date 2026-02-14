@extends('main-website.layouts.main')

@section('title', 'Join Us | Digital Sindh Institute')
@section('description', 'Join Digital Sindh Institute.')

@section('content')
<section class="login section" style="margin-top: -30px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                <div class="form-head">
                    <h4 class="title text-center">Join Us</h4>
                    <p class="text-center">Apply for admission: <a href="{{ route('dsimt.admission-apply') }}" class="btn">Apply Now</a></p>
                    <p class="text-center mt-3"><a href="{{ route('index') }}" class="btn">Back to Home</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
