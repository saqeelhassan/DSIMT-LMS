@extends('main-website.layouts.main')

@section('title', 'Login | Digital Sindh Institute')
@section('description', 'Login to your account.')

@section('content')
<!-- start login section -->
<section class="login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <div class="form-head">
                        <h4 class="title">Login</h4>
                        <form action="#" method="post">
                            <div class="form-group">
                                <label>Username or email</label>
                                <input class="margin-5px-bottom" type="email" id="exampleInputEmail1"  placeholder="Username or email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="margin-5px-bottom" type="password" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>
                            <div class="check-and-pass">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input width-auto"
                                                id="exampleCheck1">
                                            <label class="form-check-label">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <a href="javascript:void(0)" class="lost-pass">Lost your password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="button">
                                <button type="submit" class="btn">Log In</button>
                            </div>
                            <p class="outer-link">Don't have an account? <a href="{{ route('dsimt.registration') }}">Register here</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end login section -->
@endsection
