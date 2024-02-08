

   <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

   <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->


    <!-- Core JS -->
   <!-- build:js assets/vendor/js/core.js -->
   <script src="{{ url('admins/assets/vendor/libs/jquery/jquery.js')}}"></script>
   <script src="{{ url('admins/assets/vendor/libs/popper/popper.js')}}"></script>
   <script src="{{ url('admins/assets/vendor/js/bootstrap.js')}}"></script>
   <script src="{{ url('admins/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
   <script src="{{ url('admins/assets/vendor/libs/node-waves/node-waves.js')}}"></script>

   <script src="{{ url('admins/assets/vendor/libs/hammer/hammer.js')}}"></script>
   <script src="{{ url('admins/assets/vendor/libs/i18n/i18n.js')}}"></script>
   <script src="{{ url('admins/assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
   <script src="{{ url('admins/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
   <script src="{{ url('admins/assets/vendor/js/menu.js')}}"></script>
   <!-- endbuild -->
<script src="{{ url('admins/assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
   <!-- Vendors JS -->
    <script src="{{ url('admins/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
     <script src="{{ url('admins/assets/vendor/libs/autosize/autosize.js')}}"></script>
    <script src="{{ url('admins/assets/vendor/libs/cleavejs/cleave.js')}}"></script>
     <script src="{{ url('admins/assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
     <script src="{{ url('admins/assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.js')}}"></script>
     <script src="{{ url('admins/assets/vendor/libs/jquery-repeater/jquery-repeater.js')}}"></script>
     <script src="{{ url('admins/assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
     <script src="{{ url('admins/assets/vendor/libs/select2/select2.js')}}"></script>
     <script src="{{ url('admins/assets/vendor/libs/moment/moment.js')}}"></script>
   <!-- Main JS -->
   <script src="{{ url('admins/assets/js/main.js')}}"></script>

   <!-- Page JS -->
   <script src="{{ url('admins/assets/js/dashboards-crm.js')}}"></script> --}}
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>

    <!-- Page JS -->
    <script src="{{ url('admins/assets/js/forms-extras.js')}}"></script>
    <script src="{{ url('admins/assets/js/form-layouts.js')}}"></script>
    <script src="{{ url('admins/assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
    
    <!--add by manali joshi-->
     <script src="{{ url('admins/assets/vendor/libs/formvalidation/dist/js/jquery.validate.min.js')}}"></script>
     <script src="{{ url('admins/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
     <script src="{{ url('admins/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
     <script src="{{ url('admins/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
   
   @stack('script')
   <script>
        @if (session()->has('success'))
           toastr.success("{{ session()->get('success') }}");
       @endif
       @if (session()->has('error'))
           toastr.error("{{ session()->get('error') }}");
       @endif
       @if (session()->has('warning'))
           toastr.warning("{{ session()->get('warning') }}");
       @endif

       var deleteRecordByAjax = (url, moduleName, dTable) => {
            Swal.fire({
                title: "Are you sure?",
                text: `You will not be able to recover this ${moduleName}!`,
                icon: "warning",
                confirmButtonText: 'Yes, delete it!',
                showDenyButton: false,
                showCancelButton: true,
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-label-danger',
            }).then((willDelete) => {
                if (willDelete.isConfirmed) {
                    $.ajax({
                    url:url,
                    method:"DELETE",
                    dataType:"json",
                     headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                    success: function(response) {
                        if (response.status) {
                            result = true;
                            if (dTable) {
                                dTable.draw();
                            }
                            if (response.type === 'warning') {
                                toastr.warning(response.message);
                            } else {
                                toastr.success(response.message);
                            }
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function(data) {
                        toastr.error(data.responseJSON.message);
                    }
                });
                }
            })
        }



       </script>
