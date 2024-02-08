@extends('admin.layouts.app')

@section('title',"User - CRM")
@section('content')

<style>
    .img-md{
        width:180px;
        height:130px;
    }
</style>

<div class="container-fluid mt-3">
<div class="card">
    <div class="card-header row">
        <div class="col-md-10">
            <h5>User View</h5>
        </div>
        <div class="col-md-2">
            <a id="show_model" class="btn btn-success text-white btn-md">
                <i class="fa fa-plus a44 me-1" aria-hidden="true"></i> Users
            </a>
        </div>

    </div>
    <div class="card-body">
      <div class="table-responsive text-nowrap">
        <table class="table table-bordered" id="usertable">
          <thead>
            <tr>
              <th><b>SR</b></th>
               <!--<th><b>Company</b></th>-->
              <th><b>Name</b></th>
              <th><b>Email</b></th>
              <th><b>Password</b></th>
              <th><b>Action</b></th>
            </tr>
          </thead>
          <tbody>


          </tbody>
        </table>

      </div>
    </div>
  </div>

</div>

  <!--/ Bordered Table -->

@endsection
@push('script')
@include('admin.user.modal')
@include('admin.user.script')
@endpush
