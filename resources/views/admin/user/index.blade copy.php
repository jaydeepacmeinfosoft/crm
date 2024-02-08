@extends('admin.layouts.app')

@section('title', 'Dashboard - CRM')
@section('content')

    <div class="container-fluid mt-3">
        <div class="row">
            <!-- Form Repeater -->

            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">Create new User
                    </h5>
                    <div class="card-body">
                        <form class="form-repeater" id="user_form">
                            @csrf
                            <div data-repeater-list="group-a">
                                <div data-repeater-item>
                                    <div class="row">
                                        <div class="mb-3 col-lg-6 col-xl-5 col-md-4 mb-0">
                                            <label class="form-label" for="form-repeater-1-1">Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="name">
                                            <span class="name_err errMsg"></span>
                                        </div>
                                        <div class="mb-3 col-lg-6 col-xl-5 col-md-4 mb-0">
                                            <label class="form-label" for="form-repeater-1-1">email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="email">
                                            <span class="email_err errMsg"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-lg-6 col-xl-5 col-md-4 mb-0">
                                            <label class="form-label" for="form-repeater-1-2">Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="password" id="password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                 />
                                                <span class="password_err errMsg"></span>
                                        </div>
                                         <div class="mb-3 col-lg-6 col-xl-5 col-md-4 mb-0">
                                            <label class="form-label" for="form-repeater-1-2">Confirm Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                 />
                                        </div>
                                        <div class="mb-3 col-lg-6 col-xl-1 col-md-4 d-flex align-items-center mb-0">
                                            <button class="btn btn-label-danger mt-4" data-repeater-delete>
                                                <i class="ti ti-x ti-xs me-1"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <hr />
                                </div>
                            </div>
                            <div class="mb-0">
                                <a href="{{route('user.viewuser')}}" class="btn btn-default btn-md">
                                    Cancle
                                </a>
                                <button type="submit" class="btn btn-success ">
                                    Save
                                </button>
                                <button type="button" class="btn btn-primary" data-repeater-create>
                                    <i class="ti ti-plus me-1"></i>
                                    <span class="align-middle">Add</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Form Repeater -->
        </div>
    </div>

@endsection
@push('script')
    @include('admin.user.script')
@endpush
