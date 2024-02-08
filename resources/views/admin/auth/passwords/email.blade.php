@extends('admin.layouts.default')
@section('title',"Forgot Password - CRM")
@section('content')
    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-7 p-0">
        <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
            <img src="assets/img/illustrations/auth-forgot-password-illustration-light.png" alt="auth-forgot-password-cover"
                class="img-fluid my-5 auth-illustration"
                data-app-light-img="illustrations/auth-forgot-password-illustration-light.png"
                data-app-dark-img="illustrations/auth-forgot-password-illustration-dark.png" />

            <img src="assets/img/illustrations/bg-shape-image-light.png" alt="auth-forgot-password-cover" class="platform-bg"
                data-app-light-img="illustrations/bg-shape-image-light.png"
                data-app-dark-img="illustrations/bg-shape-image-dark.png" />
        </div>
    </div>
    <!-- /Left Text -->
    <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
        <div class="w-px-400 mx-auto">
            <!-- Logo -->
            <div class="app-brand mb-4">
                <a href="index.html" class="app-brand-link gap-2">
                    <span class="app-brand-logo demo">
                        CRM
                    </span>
                </a>
            </div>
            <!-- /Logo -->
            <h3 class="mb-1 fw-bold">Forgot Password? 🔒</h3>
            <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" placeholder="Enter your email" required
                        autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="mb-0">

                    <button type="submit" class="btn btn-primary">
                        {{ __('Send Password Reset Link') }}
                    </button>

                </div>
            </form>
            <div class="text-center">
                <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
                    <i class="ti ti-chevron-left scaleX-n1-rtl"></i>
                    Back to login
                </a>
            </div>
        </div>
    </div>
@endsection
