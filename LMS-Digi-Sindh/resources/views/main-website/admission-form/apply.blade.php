@extends('main-website.layouts.main')

@section('title', 'Apply for Admission | Digital Sindh Institute')
@section('description', 'Apply for admission to Digital Sindh Institute courses.')

@section('content')
<section class="login section" style="margin-top: -30px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                <div class="form-head">
                    <h4 class="title text-center">Admission Application Form</h4>
                    <p class="text-info text-center">Please visit <a href="{{ route('dsimt.admission-pitp-form') }}">PITP Form</a> for PITP program or contact us for other courses.</p>
                    <p class="text-center"><a href="{{ route('index') }}" class="btn">Back to Home</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
