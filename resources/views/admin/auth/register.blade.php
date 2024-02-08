@extends('admin.layouts.default')
@section('title',"Register - CRM")
@section('content')
 <!-- /Left Text -->
 <div class="d-none d-lg-flex col-lg-7 p-0">
    <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
      <img
        src="assets/img/illustrations/auth-login-illustration-light.png"
        alt="auth-login-cover"
        class="img-fluid my-5 auth-illustration"
        data-app-light-img="illustrations/auth-login-illustration-light.png"
        data-app-dark-img="illustrations/auth-login-illustration-dark.png" />

      <img
        src="assets/img/illustrations/bg-shape-image-light.png"
        alt="auth-login-cover"
        class="platform-bg"
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
                    Register Here
                </a>
            </div>
            <!-- /Logo -->
            <h3 class="mb-1 fw-bold">Adventure starts here 🚀</h3>
            <p class="mb-4">Make your app management easy and fun!</p>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>

                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" placeholder="Enter your username" value="{{ old('name') }}" required
                        autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 ">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Enter your email or username" name="email" value="{{ old('email') }}" required
                        autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 form-password-toggle">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group input-group-merge">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password" autocomplete="current-password">
                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password-confirm" class="form-label">Confirm Password</label>

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        autocomplete="new-password">

                </div>
                <button class="btn btn-primary d-grid w-100" type="submit">Sign up</button>
            </form>

            <p class="text-center">
                <span>Already have an account?</span>
                <a href="{{ route('login') }}">
                    <span>Sign in instead</span>
                </a>
            </p>
        </div>
    </div>
@endsection
