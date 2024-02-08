<form id="modal_form" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label for="">Company Name <span class="text-danger">*</span></label>
            <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text">
                    <i class="fa fa-building a44" aria-hidden="true"></i>
                </span>
                <input type="hidden" name="id" id="id" value="{{ $company->id??"" }}">
                <input type="text" class="form-control" id="company_name" value="{{ $company->company_name ?? old('company_name') }}" name="company_name" />
            </div>
            <span class="text-danger errMsg" id="company_name_err"></span>
        </div>
        <div class="col-md-6">
            <label for="">Company Email <span class="text-danger">*</span></label>
            <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text">
                    <i class="fa fa-envelope a44" aria-hidden="true"></i>
                </span>
                <input type="text" class="form-control" id="email" aria-label="John Doe"
                    aria-describedby="basic-icon-default-fullname2" name="email" value="{{ $company->email ?? old('email') }}" />
            </div>
            <span class="text-danger errMsg" id="email_err"></span>
        </div>
        
        <div class="col-md-6 mt-2">
            <label for="">Password <span class="text-danger">*</span></label>
            <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text">
                    <i class="fa fa-lock a44" aria-hidden="true"></i>
                </span>
                <input type="password" class="form-control" id="password" name="password" value="{{ $company->password ?? old('password') }}" />
            </div>
            <span class="text-danger errMsg" id="password_err"></span>
        </div>
        <div class="col-md-6 mt-2">
            <label for="">Confirm Password <span class="text-danger">*</span></label>
            <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text">
                    <i class="fa fa-lock a44" aria-hidden="true"></i>
                </span>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" />
            </div>
            <span class="text-danger errMsg" id="password_confirmation_err"></span>
        </div>
       
        <div class="col-md-6 mt-2">
            <label for="">Mob.No <span class="text-danger">*</span></label>
            <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text">
                    <i class="fa fa-phone a44" aria-hidden="true"></i>
                </span>
                <input type="text" class="form-control" id="number" value="{{ $company->number ?? old('number') }}" name="number"  />
            </div>
            <span class="text-danger errMsg" id="number_err"></span>
        </div>
        <div class="col-md-6 mt-2">
            <label for="address">Address <span class="text-danger">*</span></label>
            <div class="input-group input-group-merge">
                <span id="basic-icon-default-address" class="input-group-text">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                </span>
                <input type="text" class="form-control" id="address"  value="{{ $company->address ?? old('address') }}" name="address" />
            </div>
            <span class="text-danger errMsg" id="address_err"></span>
        </div>

        <div class="col-md-6"><label></label>
            <div class="input-group input-group-merge col-md-6 col-6">
                <div class="change-photo-btn">
                    <div class="photoUpload"> <span><i class="fa fa-upload"></i> Upload logo <span class="text-danger">*</span></span>
                        <input type="file" class="upload" name="logo">
                        <span class="text-danger errMsg" id="logo_err"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="holder">
                @if(isset($company) && $company->logo!= "" && $company->logo_path)
                <img class="img-md mt-2" id="imgPreview" src="{{ $company->logo_path }}" alt="pic" />
                @else
                <img class="img-md mt-2" id="imgPreview" src="{{ url('public/logos/no-image.jpg') }}" alt="pic" />
                @endif
            </div>
        </div>
        <hr class="mt-3">
        <div class="col-md-7"></div>
        <div class="col-md-5 col-12">
            <Button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</Button>
            <Button type="submit" class="btn btn-success"> Save</Button>
        </div>

    </div>
</form>
@push('script')
<script>
      //submit code
      
    $(document).on('change','input[name=logo]',function() {
        const file = this.files[0];
        console.log("lofogo: ",file);
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            console.log(event.target.result);
            $('#imgPreview').attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
    });
      $(document).on('submit','#modal_form',function(event) {
        event.preventDefault();
        var url = "{{ url('admins/company/store') }}";
        if($("#id").val() > 0){
            url = "{{ url('admins/company/update') }}";
        }
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#company_model').modal('hide');
                toastr.success(response.success);
                console.log(response.success);
                clearFormData();
                $('#companyTable').DataTable().ajax.reload();
                // Refresh the company table or update the edited row
                // Example: table.ajax.reload();
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
    });

</script>
    @endpush
