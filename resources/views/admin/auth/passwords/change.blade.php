@extends('admin.layouts.app')
@section('title',"Change Password - CRM")
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">

                        <h4 class="mb-1 pt-2">Change Password</h4>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('password.change.update') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input id="current_password" type="password"
                                    class="form-control @error('current_password') is-invalid @enderror"
                                    placeholder="Enter current password" name="current_password" required autocomplete="current_password">

                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Enter new password" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="mb-3">
                                <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    placeholder="Enter confirm password" name="password_confirmation" required
                                    autocomplete="new-password">
                            </div>

                            <div class="mb-0">

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
