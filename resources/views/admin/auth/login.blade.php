@extends('admin.layouts.default')
@section('title',"Login - CRM")
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
            {{-- <div class="app-brand mb-4">
                <a href="index.html" class="app-brand-link gap-2">
                    Login
                </a>
            </div> --}}
            <!-- /Logo -->
            <h3 class="mb-1 fw-bold">Welcome to CRM! 👋</h3>
            <p class="mb-4">Please sign-in to your account and start the adventure</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3 ">
                    <label for="email" class="form-label">Email or Username</label>
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
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">Password</label>
                        <a href="{{ route('password.request') }}">
                            <small>Forgot Password?</small>
                        </a>
                    </div>
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
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember-me"> Remember Me </label>
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
            </form>
            <p class="text-center">
                <span>New on our platform?</span>
                <a href="{{ route('register') }}">
                    <span>Create an account</span>
                </a>
            </p>
            {{-- @if (Route::has('password.request'))
            <p class="text-center">
                <a href="{{ route('password.request') }}">
                  <span>Forgot Password</span>
                </a>
              </p>
              @endif --}}
            {{-- <div class="divider my-4">
              <div class="divider-text">or</div>
            </div>

            <div class="d-flex justify-content-center">
              <a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
                <i class="tf-icons fa-brands fa-facebook-f fs-5"></i>
              </a>

              <a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3">
                <i class="tf-icons fa-brands fa-google fs-5"></i>
              </a>

              <a href="javascript:;" class="btn btn-icon btn-label-twitter">
                <i class="tf-icons fa-brands fa-twitter fs-5"></i>
              </a>
            </div> --}}
        </div>
    </div>
@endsection
