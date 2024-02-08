@extends('admin.layouts.app')
@section('title', 'Company - CRM')
<style>
    .img-md{
        width:180px;
        height:130px;
    }
</style>
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Bordered Table -->
            <div class="card mt-4">
                <div class="card-header row">
                    <div class="col-md-10 col-10">
                        <h5>Company list</h5>
                    </div>
                    <div class="col-md-2 col-2">
                          <a href="" class="btn btn-success text-white btn-md" id="show_model11" data-bs-toggle="modal"
                        data-bs-target="#company_model">
                            <i class="fa fa-plus me-1" aria-hidden="true"></i> Company
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered" id="companyTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Company Name</th>
                                    <th>Company Email</th>
                                    <th>Mobile No.</th>
                                    <th>Address</th>
                                    <th>Company Logo</th>
                                    <th>Total Employee</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('admin.company.modal')
@endsection
@push('script')
@include('admin.company.script')
@endpush
