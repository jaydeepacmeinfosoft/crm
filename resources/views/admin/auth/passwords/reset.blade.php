@extends('admin.layouts.default')
@section('title',"Reset Password - CRM")
@section('content')
    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-7 p-0">
        <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
            <img src="assets/img/illustrations/auth-reset-password-illustration-light.png" alt="auth-reset-password-cover"
                class="img-fluid my-5 auth-illustration"
                data-app-light-img="illustrations/auth-reset-password-illustration-light.png"
                data-app-dark-img="illustrations/auth-reset-password-illustration-dark.png" />

            <img src="assets/img/illustrations/bg-shape-image-light.png" alt="auth-reset-password-cover" class="platform-bg"
                data-app-light-img="illustrations/bg-shape-image-light.png"
                data-app-dark-img="illustrations/bg-shape-image-dark.png" />
        </div>
    </div>
    <!-- /Left Text -->

    <!-- Reset Password -->
    <div class="d-flex col-12 col-lg-5 align-items-center p-4 p-sm-5">
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
            <h3 class="mb-1 fw-bold">Reset Password 🔒</h3>
            @isset($email)
                <p class="mb-4">for <span class="fw-bold">{{ $email ?? old('email') }}</span></p>
            @endisset
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ $email ?? old('email') }}" placeholder="Enter email" required
                        autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Enter new password" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="mb-3">
                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" placeholder="Enter confirm password"
                        name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="mb-0">
                    <button type="submit" class="btn btn-primary d-grid w-100 mb-3">Set new password</button>

                </div>
                <div class="text-center">
                    <a href="login.html">
                        <i class="ti ti-chevron-left scaleX-n1-rtl"></i>
                        Back to login
                    </a>
                </div>

            </form>
        </div>
    </div>
@endsection
