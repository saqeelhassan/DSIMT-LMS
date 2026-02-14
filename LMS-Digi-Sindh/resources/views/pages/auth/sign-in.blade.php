@extends('layouts.base')

@section('content')
<!-- **************** MAIN CONTENT START **************** -->
<main>
    <section class="p-0 d-flex align-items-center position-relative overflow-hidden">

        <div class="container-fluid">
            <div class="row">
                <!-- left -->
                <div
                    class="col-12 col-lg-6 d-md-flex align-items-center justify-content-center bg-primary bg-opacity-10 vh-lg-100">
                    <div class="p-3 p-lg-5">
                        <!-- Title -->
                        <div class="text-center">
                            <h2 class="fw-bold">Welcome to our largest community</h2>
                            <p class="mb-0 h6 fw-light">Let's learn something new today!</p>
                        </div>
                        <!-- SVG Image -->
                        <img src="/images/element/02.svg" class="mt-5" alt="">
                        <!-- Info -->
                        <div class="d-sm-flex mt-5 align-items-center justify-content-center">
                            <!-- Avatar group -->
                            <ul class="avatar-group mb-2 mb-sm-0">
                                <li class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle" src="/images/avatar/01.jpg" alt="avatar">
                                </li>
                                <li class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle" src="/images/avatar/02.jpg" alt="avatar">
                                </li>
                                <li class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle" src="/images/avatar/03.jpg" alt="avatar">
                                </li>
                                <li class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle" src="/images/avatar/04.jpg" alt="avatar">
                                </li>
                            </ul>
                            <!-- Content -->
                            <p class="mb-0 h6 fw-light ms-0 ms-sm-3">4k+ Students joined us, now it's your turn.</p>
                        </div>
                    </div>
                </div>

                <!-- Right -->
                <div class="col-12 col-lg-6 m-auto">
                    <div class="row my-5">
                        <div class="col-sm-10 col-xl-8 m-auto">
                            <!-- Title -->
                            <span class="mb-0 fs-1">👋</span>
                            <h1 class="fs-2">Login into Digital Sindh!</h1>
                            <p class="lead mb-4">Nice to see you! Please log in with your account.</p>

                            @if(session('error'))
                                <div class="alert alert-warning mb-4">{{ session('error') }}</div>
                            @endif
                            @if($errors->any())
                                <div class="alert alert-danger mb-4">
                                    <ul class="mb-0 list-unstyled small">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Form START -->
                            <form method="post" action="{{ route('auth.login') }}">
                                @csrf
                                @if(request('intended'))
                                    <input type="hidden" name="intended" value="{{ request('intended') }}">
                                @endif
                                @if(request('enroll_course'))
                                    <input type="hidden" name="enroll_course" value="{{ request('enroll_course') }}">
                                @endif
                                <!-- Email -->
                                <div class="mb-4">
                                    <label for="email" class="form-label">Email address *</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-envelope-fill"></i></span>
                                        <input type="email" name="email" class="form-control border-0 bg-light rounded-end ps-1 @error('email') is-invalid @enderror"
                                            placeholder="E-mail" id="email" value="{{ old('email') }}" required autofocus>
                                    </div>
                                    @error('email')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>
                                <!-- Password -->
                                <div class="mb-4">
                                    <label for="password" class="form-label">Password *</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="fas fa-lock"></i></span>
                                        <input type="password" name="password" class="form-control border-0 bg-light rounded-end ps-1 @error('password') is-invalid @enderror"
                                            placeholder="Password" id="password" required>
                                    </div>
                                    @error('password')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    <div class="form-text">Your password must be 8 characters at least</div>
                                </div>
                                <!-- Check box and Forgot password -->
                                <div class="mb-4 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <input type="checkbox" name="remember" value="1" class="form-check-input" id="remember">
                                        <label class="form-check-label" for="remember">Remember me</label>
                                    </div>
                                    <a href="{{ route('password.request') }}" class="text-primary-hover small">Forgot password?</a>
                                </div>
                                <!-- Button -->
                                <div class="align-items-center mt-0">
                                    <div class="d-grid">
                                        <button class="btn btn-primary mb-0" type="submit">Login</button>
                                    </div>
                                </div>
                            </form>
                            <!-- Form END -->

                            <div class="mt-4">
                                <p class="text-muted small mb-2">Don't have an account? Register as:</p>
                                <div class="d-flex flex-wrap gap-2">
                                    <a href="{{ route('auth.sign-up.student') }}" class="btn btn-outline-primary">Register as Student</a>
                                    <a href="{{ route('auth.sign-up.staff') }}" class="btn btn-outline-secondary">Register as Staff</a>
                                </div>
                            </div>

                        </div>
                    </div> <!-- Row END -->
                </div>
            </div> <!-- Row END -->
        </div>
    </section>
</main>
<!-- **************** MAIN CONTENT END **************** -->
@endsection