<form id="userManageForm">
    @csrf
   <div class="row">
<div class="col-md-6">
            <label for="" class="col-md-6 col-6">Company <span class="text-danger">*</span></label>
            <select name="company_id" id="company_id" required class="form-control" @if(auth()->user()->user_type == 2) {{ "disabled" }} @endif>
                <option value="">Select Company</option>
                 <?php
                 $allcompany =App\Models\Company::get();

                ?>
                @if(auth()->user()->user_type == 1)
                @foreach ($allcompany as $key => $all)
                        <option value="{{ $all->id }}">{{ $all->company_name }}</option>
                    @endforeach
                    
                @elseif(isset($companies))
                    @foreach ($companies as $key => $comp)
                        <option @if (old('company_id') == $comp->id || (auth()->user()->user_type == 2 && auth()->user()->company_id ==  $comp->id)) {{ " selected" }} @endif value="{{ $comp->id }}">{{ $comp->company_name }}</option>
                    @endforeach
                @endif
            </select>

            <span class="text-danger errMsg" id="company_id_err"></span>
            @error('vCompany')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="">Roll <span class="text-danger">*</span></label>
            <div class="input-group input-group-merge">
            <select name="user_roll" id="user_roll" required class="form-control">
                <option value="">Select Roll</option>
                <option value="1">Account</option>   
                <option value="2">Marketing</option> 
                <option value="3">sales</option> 
            </select>
                 
                
            
            </div>
            <span class="text-danger errMsg" id="user_roll_err"></span>
        </div>
        </div>
    <div class="row mt-2">
        <div class="col-md-6">
            <label for="">Name <span class="text-danger">*</span></label>
            <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text">
                    <i class="fa fa-envelope a44" aria-hidden="true"></i>
                </span>
                <input type="hidden" name="id" id="id">
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" />
            </div>
            <span class="text-danger errMsg" id="name_err"></span>
        </div>
        <div class="col-md-6">
            <label for="">Email<span class="text-danger">*</span></label>
            <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text">
                    <i class="fa fa-envelope a44" aria-hidden="true"></i>
                </span>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" />

            </div>
            <span class="text-danger errMsg" id="email_err"></span>

        </div>
    </div>
    <div class="row mt-2" id="passwordDiv">
            <div class="col-md-6 mt-2" >
                <label for="">Password <span class="text-danger">*</span></label>
                <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text">
                        <i class="fa fa-lock a44" aria-hidden="true"></i>
                    </span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password"/>
                </div>
                <span class="text-danger errMsg" id="password_err"></span>
            </div>
            <div class="col-md-6 mt-2">
                <label for="">Confirm Password <span class="text-danger">*</span></label>
                <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text">
                        <i class="fa fa-lock a44" aria-hidden="true"></i>
                    </span>
                    <input type="password" class="form-control" id="password_confirmation"
                        name="password_confirmation"  placeholder="Enter Your Confirm Password"/>
                </div>
                <span class="text-danger errMsg" id="password_confirmation_err"></span>
            </div>
    </div>
     <div class="row mt-2" >
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
               
                <img class="img-md mt-2" id="imgPreview" src="{{ url('public/logos/no-image.jpg') }}" alt="pic" />
                
            </div>
        </div>
</div>
    <div class="row">
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
        $(document).on('submit', '#userManageForm', function(event) {
            $(".errMsg").empty();
            event.preventDefault();
            var userId = $('#id').val();
            var url = "{{ route('user.store') }}";
            if ($("#id").val() > 0) {
                url = '{{ route('user.update', ['id' => '__USER_ID__']) }}'.replace('__USER_ID__', userId);
            }
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#userManageModal').modal('hide');
                    toastr.success(response.success);
                    console.log(response.success);
                    $('#usertable').DataTable().ajax.reload();
                     window.location.reload();
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
