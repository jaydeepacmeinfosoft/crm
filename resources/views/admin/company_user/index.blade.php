@extends('admin.layouts.app')
@section('title', 'Company With User')
<style>
    .img-md{
        width:180px;
        height:130px;
    }
</style>
@section('content')
 
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="card">
                <h5 class="card-header">Total Company List</h5>
                <br>
                <div class="row justify-content-end">
        <div class="col-md-2 col-2">
            <a href="" class="btn btn-success text-white btn-md" id="modal_company" data-bs-toggle="modal" data-bs-target="#company_model">
                <i class="fa fa-plus me-1" aria-hidden="true"></i>AddCompany
            </a>
        </div>
    </div>
                <div class="card-datatable table-responsive">
                  <table class="dt-responsive table" id="companyTable">
                    <thead>
                      <tr>
                        <th>Sr No.</th>
                        <th>Comapny Name</th>
                        <th>Company Email</th>
                        <th>Address</th>
                        <th>Password</th>
                        <th>Total users</th>
                        <th>Action</th>
                        <th>User Details</th>
                        
                      </tr>
                    </thead>
                    <tbody>
              
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Sr No.</th>
                        <th>Comapny Name</th>
                        <th>Company Email</th>
                        <th>Address</th>
                        <th>Password</th>
                        <th>Total users</th>
                        <th>Action</th>
                        <th>User Details</th>

                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>

              <!-- Share Project Modal -->
              <div class="modal fade" id="cuserview" tabindex="-1" aria-hidden="true">
              <form id="form_modal" enctype="multipart/form-data">
                <div class="modal-dialog modal-lg modal-simple modal-enable-otp modal-dialog-centered">
                  <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      
                      <div class="text-center"  >

                        <h3 class="mb-2" id="modal_title">   </h3>
                        <p>U can Here - Add, Edit, Delete</p>
                      </div>
                    </div>
                    
                    <h4 class="mb-4 pb-2" id="user_count"></h4>
                    <ul class="p-0 m-0" id="user_list">
                     
                      
                    </ul>

                    <div class="mt-4 align-items-center text-center">
                        <a id="show_model" class="btn btn-primary waves-effect waves-light show_model">Add New User +</a>
                    </div>
                    
                  </div>
                </div>
             </form>
              </div>
              <!--/ Share Project Modal -->

            </div>
            <!-- / Content -->

           

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
          @include('admin.company.modal')
         
@endsection     
@push('script')
@include('admin.company.script')
@include('admin.user.modal')
@include('admin.user.script')
 
@endpush
