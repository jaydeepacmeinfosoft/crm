@extends('admin.layouts.app')
@section('title',"Edit Profile - CRM")
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-1 pt-2">Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                          <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter your username" value="{{ $result->name??old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="mb-3 ">
                            <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"  placeholder="Enter your email or username" name="email" value="{{ $result->email??old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-0">

                          <button class="btn btn-primary d-grid" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
