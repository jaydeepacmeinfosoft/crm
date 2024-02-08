 <!-- Edit User Modal -->
 <div class="modal fade" id="ManageLead" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-simple modal-edit-user">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <div class="mb-4">
                    <h5 class="mb-2" id="manageLeadTitle"> {{ isset($lead)?"Edit":"Add"}} Lead</h5>
                    <hr>
                </div>

                <div class="row g-3" id="formData">
                    @if(!isset($lead) && !isset($lead->iid))
                        @include("admin.lead._form")
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Edit User Modal -->

<div class="modal fade" id="ManageActivity111" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Schedule An Activity</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <div class="row">
            {{-- <div class="col-md-7">
                <div id="activityData">
                    @include("admin.activity._form")
                </div>
            </div> --}}
            <div class="col-md-8 pr-calendar">
                <div id="fullcalendar"></div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Add New Credit Card Modal -->
  <div class="modal fade bottom modal-md" id="addNewCCModal" tabindex="-1"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
      <div class="modal-content p-3 p-md-5">
          <div class="modal-body">
              <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close"></button>
              <div class="mb-4">
                  <h5 class="mb-2">Mark as lost</h5>
                  <div class="row card-body a47">
                      <span class="col-md-12 a44">Wipro Deal</span>
                      <span class="col-md-12 a44">wipro,ruhi patel Contact</span>
                      <span class="col-md-3 col-3 a44"><i
                              class="fa fa-phone text-light" aria-hidden="true"
                              title="Schedule an activity">
                          </i>
                      </span>
                  </div>
              </div>
              <form id="addNewCCForm" class="row g-3" onsubmit="return false">
                  <div class="col-12">
                      <label>Lost Reason
                      </label class="form-label" for="modalAddCardName">
                      <div class="input-group input-group-merge">
                          <input id="modalAddCard" name="modalAddCard"
                              class="form-control credit-card-mask" type="text"
                              aria-describedby="modalAddCard2" />
                              <span class="input-group-text cursor-pointer p-1"
                              id="modalAddCard2"><span class="card-type"></span></span>
                      </div>
                  </div>
                  <div class="col-12">
                      <label class="form-label"
                          for="modalAddCardName">Comments</label>
                      <input type="text" id="modalAddCardName"
                          class="form-control a48" />
                  </div>

                  <hr>
                  <div class="col-12">
                      <a href="everyone.html" type="submit"
                          class="btn btn-danger me-sm-3 me-1">Mark as lost</a>


                      <button class="btn btn-label-secondary btn-reset"
                          aria-label="Close">
                          <a href="everyone.html" class="text-muted">
                              Cancel
                          </a>
                      </button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
<!--/ Add New Credit Card Modal -->



<!-- Bulk Lead Modal -->
<div class="modal fade" id="BulkLead" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog  modal-simple modal-edit-user">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearForm()"></button>
                <div class="mb-4">
                    <h5 class="mb-2" id="manageLeadTitle"> {{ isset($lead)?"Edit":"Add"}} Bulk Lead</h5>
                    <hr>
                </div>
                <form id="bulklead" action=""   enctype="multipart/form-data" exclefile>
                   @csrf <div class="row g-3" id="formData">
                        <div class="row">
                        </div>
                    
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Select File<span class="text-danger">*</span></label>
                                <input type="file" class="form-control"  name="file" value=" "  />

                                <span class="text-danger errMsg" id="file_err"></span>
                                @error('file')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <hr class="mt-5">
                            <div class="row">
                            <div class="col-md-12" style="float: right">
                             <a href="{{url('admins/assets/excalfile/Bulk_lead.xlsx')}}" download>   Download .xlsx sample file </a>|
                             <a href="{{url('admins/assets/excalfile/Bulk_lead.csv')}}" download> .csv sample file </a>
                           </div>
                        </div>
                        <br><br>
                        
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <button type="button" class="btn btn-default float-end ms-2"
                                    data-bs-dismiss="modal" onclick="clearForm()">Cancel</a>
                                    <button type="submit" class="btn btn-success float-end ">Upload</a>
                            </div>
                        </div>
                    </div>    
                </form>
            </div>
        </div>
    </div>
</div>  


@push('script')
    <script>
       
        $(document).on('submit','#bulklead',function(event) {
            event.preventDefault();
            if( $("#bulklead").validate()){
                var formData = new FormData(this);
                var url = $(this).attr("action");
                $.ajax({
                    url: "{{route('lead.bulklead')}}",
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: formData,
                    // headers: {
                    //     "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    // },
                    success: function(result) {
                        $(".errMsg").empty();
                        if (result.status) {
                            toastr.success(result.success);
                            $("#BulkLead").modal("hide");
                            $('#leadReportList').DataTable().ajax.reload();
                            clearFormData();
                            window.location.reload();
                        }
                         else {
                            // Check if there's an error message
                            if (result.error) {
                                var errorMessage = result.error;
                                // Display the error message in the specified div
                                document.getElementById('file_err').textContent = errorMessage;
                                // document.getElementById('errorDiv').style.display = 'block';
                            }
                        }
                    },
                    error: function(data) {
                        if (data.responseJSON) {
                            $(".errMsg").empty();
                            $("#errMessage").removeClass("d-none");
                            console.log(data.responseJSON.errors);
                            $.each(data.responseJSON.errors, function(key, value) {
                                var errMsg = "";
                                $.each(value, function(k, v) {
                                    errMsg += "<h6 class='text-danger'>" + v + "</h6>";
                                });
                                $("#" + key + "_err").html(errMsg);
                            });
                        }
                    }
                });
            }
        });

      function clearForm() {
    
        var form = document.getElementById("bulklead");
    
  
        form.reset();
        var errorDivs = form.getElementsByClassName("errMsg");
        for (var i = 0; i < errorDivs.length; i++) {
        errorDivs[i].textContent = ""; // Clear the error messages
    }
}
    </script>
    
@endpush