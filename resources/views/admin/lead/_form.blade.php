<form id="manageLeadForm">
    @csrf
    <input type="hidden" id="vleadType" name="vleadType" value="{{ $lead->vleadType ?? 'general' }}">
    <input type="hidden" id="id" name="id" value="{{ $lead->iid ?? '' }}">
    <input type="hidden" id="id" name="vCompany" value="{{auth()->user()->company_id }}">
    <div class="row">
    <div class="col-md-6">
            <label for="">Company Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" required name="company_name"
                    value="{{ $lead->company_name ?? old('company_name') }}" />

            <span class="text-danger errMsg" id="company_name_err"></span>
            @error('company_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="">Full Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" required name="vFullname"
                    value="{{ $lead->vFullname ?? old('vFullname') }}" />

            <span class="text-danger errMsg" id="vFullname_err"></span>
            @error('vFullname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <!-- <label for="" class="col-md-6 col-6">Company <span class="text-danger">*</span></label>
            <select name="vCompany" required class="form-control" >
                <option value="">Select Company</option>
                @if(isset($companies))
                    @foreach ($companies as $key => $comp)
                        <option @if (old('vPipeline') == $comp->id || (auth()->user()->user_type == 2 && auth()->user()->company_id ==  $comp->id) ||(isset($lead) && $lead->vCompany == $comp->id)) {{ " selected" }} @endif value="{{ $comp->id }}">{{ $comp->company_name }}</option>
                    @endforeach
                @endif
            </select> -->

            {{-- <div class="input-group input-group-merge col-md-6 col-6">
                <span id="basic-icon-default-fullname2" class="input-group-text">
                    <i class="fa fa-building" aria-hidden="true"></i>

                </span>
                <input type="text" name="vCompany" class="form-control"
                    value="{{ $lead->vCompany ?? old('vCompany') }}" />
            </div> --}}
            <span class="text-danger errMsg" id="vCompany_err"></span>
            @error('vCompany')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mt-3">
            <label for="" class="col-md-6 col-6">Whatsapp <span class="text-danger">*</span></label>
            <input type="number" required class="form-control" name="vWhatsapp" value="{{ $lead->vWhatsapp ?? old('vWhatsapp') }}" />
            <span class="text-danger errMsg" id="vWhatsapp_err"></span>
            @error('vWhatsapp')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6 mt-3">
            <label for="">Email <span class="text-danger">*</span></label>
            <input type="email" required name="vEmail" class="form-control" value="{{ $lead->vEmail ?? old('vEmail') }}">
            <span class="text-danger errMsg" id="vEmail_err"></span>
            @error('vFullname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mt-3">
        <!-- <div class="col-md-6">
            <label for="">Title  </label>
            <input type="text"   name="vTitle" value="{{ $lead->vTitle ?? old('vTitle') }}" class="form-control">
            <span class="text-danger errMsg" id="vTitle_err"></span>
            @error('vTitle')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div> -->
        <div class="col-md-4">
            <label for="" class="mt-3" class="form-label">Platform <span class="text-danger">*</span>
            </label>
            <select required name="vPlateform" class="form-control">
                <option value="">Select Plateform</option>
                <option @if (old('vPlateform') == 'facebook' || (isset($lead) && $lead->vPlateform == 'facebook')) {{ 'selected' }} @endif value="facebook">Facebook
                </option>
                <option @if (old('vPlateform') == 'instagram' || (isset($lead) && $lead->vPlateform == 'instagram')) {{ 'selected' }} @endif value="instagram">instagram
                </option>
                <option @if (old('vPlateform') == 'twitter' || (isset($lead) && $lead->vPlateform == 'twitter')) {{ 'selected' }} @endif value="twitter">twitter</option>
                <option @if (old('vPlateform') == 'online' || (isset($lead) && $lead->vPlateform == 'online')) {{ 'selected' }} @endif value="online">Online</option>
                <option @if (old('vPlateform') == 'whatsapp' || (isset($lead) && $lead->vPlateform == 'whatsapp')) {{ 'selected' }} @endif value="whatsapp">Whatsapp
                </option>
            </select>
            <span class="text-danger errMsg" id="vPlateform_err"></span>
            @error('vPlateform')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="" class="mt-3">Pipeline  </label>
            <select name="vPipeline"   class="form-control col-md-12" @if(isset($type) && $type > 0) {{ "disabled" }} @endif>
                @if(isset($leadTypeArr))
                    @foreach ($leadTypeArr as $key => $leadT)
                        <option @if (old('vPipeline') == $leadT->id || (isset($type) && $type ==  $leadT->id) ||(isset($lead) && $lead->vPipeline == $leadT->id)) {{ " selected" }} @endif value="{{ $leadT->id }}">{{ $leadT->category }}</option>
                    @endforeach
                @endif
            </select>
             <input type="hidden" name="leadTypeId" value="{{$type??""}}" />
            <span class="text-danger errMsg" id="vPipeline_err"></span>
            @error('vPipeline')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
         <div class="col-md-4">
            <label for="" class="mt-3">Assign User  </label><span class="text-danger">*</span>
         
            <select name="assign_userid"   class="form-control col-md-12"  >
            <option value="">Select User</option>
                @if(isset($assign_user))
                    @foreach ($assign_user  as $user)
                        <option  value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                @endif
            </select>
             <!-- <input type="hidden" name="leadTypeId" value="{{$type??""}}" /> -->
            <span class="text-danger errMsg" id="assign_userid_err"></span>
            @error('assign_userid')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <!-- <div class="row mt-3"> -->
        <!-- <div class="col-md-6">
            <label for="">Value(money)  </label>
            <input type="Number"   name="dValue" value="{{ $lead->dValue ?? old('dValue') }}" class="form-control">
            <span class="text-danger errMsg" id="dValue_err"></span>
            @error('vFullname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div> -->
        <!-- <div class="col-md-6"> -->
            <!-- <label class="form-label" for="multicol-country">Currency  </label>
            <select id="multicol-country"   name="vCurrency" class="select2 form-select" data-allow-clear="true">
                @if(isset($currency))
                    @foreach ($currency as $currKey => $curr)
                        <option @if (old('vCurrency') == $currKey || (isset($lead) && $lead->vCurrency == $currKey) || $currKey == "INR") {{ 'selected' }} @endif value="{{ $currKey }}">
                            {{ $curr }}</option>
                    @endforeach
                @endif
            </select>
            <span class="text-danger errMsg" id="vCurrency_err"></span>
            @error('vCurrency')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div> -->
    <!-- </div> -->
   
    <!-- <div class="row mt-3"> -->
        <!-- <div class="col-md-6">
            <label for="" class="mt-3">Expected Start date  </label>
            <input type="date"   name="dExpectedStartDate" class="form-control"
                value="{{ $lead->dExpectedStartDate ?? old('dExpectedStartDate') }}" placeholder="MM/DD/YYYY">
            <span class="text-danger errMsg" id="dExpectedStartDate_err"></span>
            @error('dExpectedStartDate')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="" class="mt-3">Expected close date  </label>
            <input type="date" name="dExpectedCloseDate"
                value="{{ $lead->dExpectedCloseDate ?? old('dExpectedCloseDate') }}" class="form-control"
                placeholder="MM/DD/YYYY"  >
            <span class="text-danger errMsg" id="dExpectedCloseDate_err"></span>
            @error('dExpectedCloseDate')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12 mb-2">
            <label for="">Remark</label>
            <input type="text" name="vRemark" value="{{ $lead->vRemark ?? old('vRemark') }}" class="form-control">
            <span class="text-danger errMsg" id="vRemark_err"></span>
            @error('vRemark')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div> -->
     <div class="row mt-3">
        <div class="col-md-4  ">
            <label for="">Country</label>
             <select class="form-select select-2 mb-3" id="country" name="country_id">
                <option selected disabled>Select country</option>
                @foreach ($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
           
        </div>
        <div class="col-md-4  ">
            <label for="">State</label>
             <select class="form-select   mb-3" id="state" name="state_id"></select> 
        </div>
        <div class="col-md-4 ">
            <label for="">City</label>
             <select class="form-select   mb-3" id="city" name="city_id"></select> 
        </div>
    </div>
    <div class="row ">
       
       <div class="col-md-4 ">
           <label class="form-label mt-3" for="multicol-confirm-password">Probability  </label>
           <input type="text"   name="dProbability" placeholder="87%" class="form-control" value="{{ $lead->dProbability ?? old('dProbability') }}" />
           <span class="text-danger errMsg" id="dProbability_err"></span>
           @error('dProbability')
               <div class="alert alert-danger">{{ $message }}</div>
           @enderror
       </div>
   </div>
        <!-- <div class="row mt-4">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary float-end" id="addProduct">Add</button>
            </div>
            <div class="col-md-12 row" id="myForm">
                <div id="item_row">
                    @if (isset($leadItem) && count($leadItem) > 0)
                    @foreach ($leadItem as $lKey =>$lItem)
                    <div class="row cloneItem">
                        <input type="hidden" name="count[]" class="count" value="{{ $lKey+1 }}" />
                        <div class="col-md-3 col-12 mt-2 p-1 m-0">
                            <label for="form-repeater-1-1" class="form-label">Item  </label>
                            <input type="text"   name="item[]" value="{{ $lItem->vItem }}" class="form-control">
                        </div>

                        <div class="col-md-2 col-6 mt-2 p-1 m-0">
                            <label for="form-repeater-1-2" class="form-label">Price  </label>
                            <input type="number"   name="price[]" value="{{ $lItem->dPrice }}"  min="1" step="0.01"
                                class="form-control CalculateAmount">
                        </div>

                        <div class="col-md-2 col-6 mt-2 p-1 m-0">
                            <label for="form-repeater-1-3" class="form-label">Quantity  </label>
                            <input type="number"   name="quantity[]" value="{{ $lItem->fQuantity }}"  min="1" step="0.01" class="form-control CalculateAmount">
                        </div>

                        <div class="col-md-2 col-6 mt-2 p-1 m-0">
                            <label for="form-repeater-1-4" class="form-label">Tax  </label>
                            <input type="number"   name="tax[]" value="{{ $lItem->dTax }}"
                                class="form-control CalculateAmount"  step=0.01>
                        </div>

                        <div class="col-md-2 col-6 mt-2 p-1 m-0">
                            <label for="form-repeater-1-5" class="form-label">Amount  </label>
                            <input type="number" name="amount[]"   min="1"  step="0.01" value="{{ $lItem->dAmount }}" redonly class="form-control">
                        </div>
                        <div class="col-md-1 col-6 mt-2 p-1 m-0">
                            <button type="submit" class="btn btn-danger mt-4 removeBtn" id="1"><i
                                    class="fa fa-close"></i></button>
                        </div>
                    </div>
                    @endforeach
                    @else
                        <div class="row cloneItem">
                            <input type="hidden" name="count[]" class="count" value="1" />
                            <div class="col-md-3 col-12 mt-2 p-1 m-0">
                                <label for="form-repeater-1-1" class="form-label">Item  </label>
                                <input type="text"   name="item[]" class="form-control">
                            </div>

                            <div class="col-md-2 col-6 mt-2 p-1 m-0">
                                <label for="form-repeater-1-2" class="form-label">Price </label>
                                <input type="number"   name="price[]" min="1" step="0.01"
                                    class="form-control CalculateAmount">
                            </div>

                            <div class="col-md-2 col-6 mt-2 p-1 m-0">
                                <label for="form-repeater-1-3" class="form-label">Quantity  </label>
                                <input type="number"   name="quantity[]"  min="1"  step="0.01"
                                    class="form-control CalculateAmount">
                            </div>

                            <div class="col-md-2 col-6 mt-2 p-1 m-0">
                                <label for="form-repeater-1-4" class="form-label">Tax  
                                </label>
                                <input type="number"   name="tax[]" step="0.01"  value="0.00"
                                    class="form-control CalculateAmount" step=0.01>
                            </div>

                            <div class="col-md-2 col-6 mt-2 p-1 m-0">
                                <label for="form-repeater-1-5" class="form-label">Amount  </label>
                                <input type="number" name="amount[]"  min="1" step="0.01" redonly class="form-control">
                            </div>
                            <div class="col-md-1 col-6 mt-2 p-1 m-0">
                                <button type="submit" class="btn btn-danger mt-4 removeBtn" id="1"><i
                                        class="fa fa-close"></i></button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div> -->
        <hr class="mt-5">
        <div class="row">
            <div class="col-md-12 col-12">
                <button type="button" class="btn btn-default float-end ms-2" data-bs-dismiss="modal">Cancel</a>
                <button type="submit" class="btn btn-success float-end ">Save</a>
            </div>
        </div>
    </div>

</form>
<div class="cloneDiv d-none">
    <div class="row cloneItem">
        <input type="hidden" name="count[]" class="count" value="1" />
        <div class="col-md-3 col-12 mt-2 p-1 m-0">
            <label for="form-repeater-1-1" class="form-label">Item  </label>
            <input type="text" name="item[]" class="form-control" required>
        </div>

        <div class="col-md-2 col-6 mt-2 p-1 m-0">
            <label for="form-repeater-1-2" class="form-label">Price  </label>
            <input type="number"   name="price[]" min="1" step="0.01" class="form-control CalculateAmount">
        </div>

        <div class="col-md-2 col-6 mt-2 p-1 m-0">
            <label for="form-repeater-1-3" class="form-label">Quantity  </label>
            <input type="number"   name="quantity[]" min="1" step="0.01" class="form-control CalculateAmount">
        </div>

        <div class="col-md-2 col-6 mt-2 p-1 m-0">
            <label for="form-repeater-1-4" class="form-label">Tax  
            </label>
            <input type="number"   name="tax[]" step="0.01" value="0.00"
                class="form-control CalculateAmount" step=0.01>
        </div>

        <div class="col-md-2 col-6 mt-2 p-1 m-0">
            <label for="form-repeater-1-5" class="form-label">Amount  </label>
            <input type="number" name="amount[]" min="1" step="0.01" class="form-control">
        </div>
        <div class="col-md-1 col-6 mt-2 p-1 m-0">
            <button type="button" class="btn btn-danger mt-4 removeBtn"><i class="fa fa-close"></i></button>
        </div>
    </div>
</div>
@push('script')

    <script>
        $(function() {
            $("#manageLeadForm").validate();
        });
        var type = "{{ $type??''}}";
        function clearFormData(){
            $.ajax({
                url: "{{ url('/admins/lead/clearFormData')}}",
                type: "post",
                data:{"type":type},
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function (response) {
                    $("#manageLeadTitle").html("Add Lead");
                    $("#formData").html(response.data);
                },
                error: function (xhr) {
                    console.log("An error occurred while deleting the company");
                },
            });
        }
        $('#ManageLead').on('hidden.bs.modal', function (e) {
             clearFormData();
        })
        $(document).on('submit','#manageLeadForm',function(event) {
            event.preventDefault();
            if( $("#manageLeadForm").validate()){
                var formData = new FormData(this);
                var url = $(this).attr("action");
                $.ajax({
                    url: "{{ route('lead.store') }}",
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
                            $("#ManageLead").modal("hide");
                            $('#leadReportList').DataTable().ajax.reload();
                            clearFormData();
                              window.location.reload();
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

        $(document).on('click', '#addProduct', function() {

                var count = $("#item_row").last().find(".removeBtn").attr("id");
            $(".cloneDiv .cloneItem").clone().appendTo("#item_row");
            const lastClone = $('#item_row').last().find(".cloneItem");
            setTimeout(() => {
                $(lastClone).find('input[name="count[]"]').each(function(index, element) {
                    $(element).val(index + 1);
                });
                $(lastClone).find('.removeBtn').each(function(index, element) {
                    $(element).attr("id", index + 1);
                });
                $(".CalculateAmount").on("keyup", function() {
                    var price = $(this).parents(".cloneItem").find('input[name="price[]"]').val();
                    var qty = $(this).parents(".cloneItem").find('input[name="quantity[]"]').val();
                    var tax = $(this).parents(".cloneItem").find('input[name="tax[]"]').val();
                    var amount = price * qty;
                    var finalAmount = amount;
                    var taxAmount = 0;
                    if (tax > 0) {
                        taxAmount = ((amount * tax) / 100).toFixed()
                    }
                    var finalAmount = parseFloat(amount) + parseFloat(taxAmount);
                    $(this).parents(".cloneItem").find('input[name="amount[]"]').val(finalAmount);
                });
                $("form[name='item[]']").validate();
                $("form[name='price[]']").validate();
                $("form[name='quantity[]']").validate();

                $("#manageLeadForm").validate();
            }, 100);

        });
        $(document).on('click', '.removeBtn', function() {
            $(this).parents('.cloneItem').remove();
        });

        $(document).on('keyup', '.CalculateAmount',function() {
            console.log("dfsdfsdfs")
            var price = $(this).parents(".cloneItem").find('input[name="price[]"]').val();
            var qty = $(this).parents(".cloneItem").find('input[name="quantity[]"]').val();
            var tax = $(this).parents(".cloneItem").find('input[name="tax[]"]').val();
            var amount = price * qty;
            var finalAmount = amount;
            var taxAmount = 0;
            if (tax > 0) {
                taxAmount = ((amount * tax) / 100).toFixed()
            }
            var finalAmount = parseFloat(amount) + parseFloat(taxAmount);
            $(this).parents(".cloneItem").find('input[name="amount[]"]').val(finalAmount);
        });
    </script>
    
     <script type="text/javascript">
        $(document).ready(function () {
            $('#country').on('change', function () {
                var countryId = this.value;
                $('#state').html('');
                $.ajax({
                    url: '{{ route('getStates') }}?country_id='+countryId,
                    type: 'get',
                    success: function (res) {
                        $('#state').html('<option value="">Select State</option>');
                        $.each(res, function (key, value) {
                            $('#state').append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city').html('<option value="">Select City</option>');
                    }
                });
            });
            $('#state').on('change', function () {
                var stateId = this.value;
                $('#city').html('');
                $.ajax({
                    url: '{{ route('getCities') }}?state_id='+stateId,
                    type: 'get',
                    success: function (res) {
                        $('#city').html('<option value="">Select City</option>');
                        $.each(res, function (key, value) {
                            $('#city').append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endpush
