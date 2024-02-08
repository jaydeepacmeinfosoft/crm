@extends('admin.layouts.app')
@section('title', 'Add Subscription - CRM')

@section('content')
<style>
    .img-md{
        width:180px;
        height:130px;
    }
    
    input.tags {
        /* border: none; */
        box-shadow: none;
        /* width: auto; */
        margin: 0;
        /* padding: 0; */
    }

    input.tags:focus {
        outline: none;
        background: transparent;
    }

    .tag-cloud {
        display: block;
        /* height: 80px; */
        /* padding: .25em; */
        border: 1px solid #dbdbdb;
        box-shadow: 0 1px 3px 0px rgba(0, 0, 0, 0.06);
        /* margin: .25em 0; */
        /* background: #FFF; */
        /* border: solid 1px #999; */
        border-radius: 2px;
        /* box-shadow: inset 0 0 4px rgba(0,0,0,0.5), 0 1px 0 #FFF; */
    }

    .tag {
        display: inline-flex;
        border-radius: 4px;
        background: #09C;
        color: #fff;
        margin: 0 3px 0 0;
        padding: .25em;
    }

    a.close {
        display: block;
        float: right;
        white-space: nowrap;
        overflow: hidden;
        width: 1em;
        height: 1em;
        margin: .125em 0 0 .5em;
        text-indent: -999em;


    }

    a.close:before {
        position: relative;
        display: block;
        float: left;
        content: "\2716";
        font-size: 1em;
        font-weight: bold;
        text-indent: 0;
        text-shadow: 0 -1px 0 #123;
        line-height: 1em;
        color: #007399;


    }

</style>
<div class="container-fluid">
        <div class="row">
            <!-- Bordered Table -->
            <div class="card mt-4">
                <div class="card-header row">
                    <div class="col-md-10 col-10">
                        <h5>Add Subscription Plan</h5>
                    </div>
                   
                </div>

                <div class="card-body">
                <form action="{{route('subscription.store')}}" method="post" id="addplan" enctype="multipart/form-data">
                        @csrf
                <div class="row">
               
                <div class="col-md-4">
                    <label for="">Title <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text">
                   
                    </span>
                    <input type="text" class="form-control" id="title" value="{{old('title')}}" name="title"  placeholder="Enter Title" required />
                    
                </div>
               
                </div>
                
            
              
               
               <div class="col-md-4">
                   <label for="">Duration <span class="text-danger">*</span></label>
                   <div class="input-group input-group-merge">
                   <span id="basic-icon-default-fullname2" class="input-group-text">
                  
                   </span>
                   <input type="text" class="form-control" id="duration" value="{{old('duration')}}" name="duration" placeholder="Enter Duration" required />
</div>
               </div>
               <div class="col-md-4">
                   <label for="">Period <span class="text-danger">*</span></label>
                   <div class="input-group input-group-merge">
                   <span id="basic-icon-default-fullname2" class="input-group-text">
                  
                   </span>
                   <select name="period" id="period"  class="form-control"  required >
                   <option value="">Select Time Period</option>
                    <option value="1">Year</option>
                    <option value="2">Month</option>
                    <option value="3">Day</option>
                    </select>
</div>
               </div>
               <div class="col-md-6">
                   <label for="">Price <span class="text-danger">*</span></label>
                   <div class="input-group input-group-merge">
                   <span id="basic-icon-default-fullname2" class="input-group-text">
                  
                   </span>
                   <input type="text" class="form-control" id="price" value="{{old('price')}}" name="price" placeholder="Enter Price per month" required />
</div>
               </div>
               <div class="col-md-6">
                   <label for="">Discount  </label>
                   <div class="input-group input-group-merge">
                   <span id="basic-icon-default-fullname2" class="input-group-text">
                  
                   </span>
                   <input type="text" class="form-control" id="discount" value="{{old('discount')}}" name="discount" placeholder="Enter Discount" />
</div>
               </div>
               
               <div class="col-md-6">
                   <label for="">Price(After Discount) <span class="text-danger">*</span></label>
                   <div class="input-group input-group-merge">
                   <span id="basic-icon-default-fullname2" class="input-group-text">
                  
                   </span>
                   <input type="text" class="form-control" id="price_month" value="{{old('price_month')}}" name="price_month" placeholder="Enter Price per month (after discount)" required />
                </div>
                </div>
                <div class="col-md-6">
                   <label for="">Price(Year) <span class="text-danger">*</span></label>
                   <div class="input-group input-group-merge">
                   <span id="basic-icon-default-fullname2" class="input-group-text">
                  
                   </span>
                   <input type="text" class="form-control" id="price_year" value="{{old('price_year')}}" name="price_year" placeholder="Enter Price per Year" required />
                </div>
                </div>
        <div class="col-md-6">
                    <label for="">Listing <span class="text-danger">*</span></label>
                  
                    <input type="text" name="list_tags" id="text-tags" class="tags form-control" value="" placeholder="Enter Listing value"  >
                                    <input type="hidden" name="list_tags[]" id="hidden-tags-input">
                                </div>
        <div class="col-md-7">
                   <label for="">discription  </label>
                   <div class="input-group input-group-merge">
                  
                   <textarea name="discription" class="form-control" cols="6" rows="6"></textarea>
                   </span>
                   
               </div>    
        
</div>
<div class="row mt-2" >
               <div class="col-md-4"><label></label>
            <div class="input-group input-group-merge col-md-6 col-6">
                <div class="change-photo-btn">
                    <div class="photoUpload"> <span><i class="fa fa-upload"></i> Upload logo <span class="text-danger">*</span></span>
                        <input type="file" class="upload" name="plan_logo" required>
                        
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
            <hr class="mt-3">
        <div class="col-md-5"></div>
        <div class="col-md-7 col-12">
        
        <button type="submit" class="btn btn-success"> Save</button>
       
</form></div>

         </div>
        </div>
    </div>
   
@endsection

@push('script')
<script>
    (function($) {
        var methods = {
            init: function(opts) {
                opts = opts || {};
                opts.tags = opts.tags || [];

                return this.each(function() { // Iterate over each matched element
                    var me = $(this);
                    var clean = new RegExp(',', 'g');
                    me.wrap('<div class="tag-cloud" />');
                    var cloud = me.parents('.tag-cloud');

                    cloud.click(function() {
                        me.focus();
                    });

                    var addTag = function(value) {
                        value = value.replace(clean, ''); // Clean up the entered value
                        if (value !== '') {
                            var tag = $('<div class="tag"><span>' + value + '</span></div>');
                            var del = $('<a href="#" class="close">Delete</a>');

                            del.click(function(event) {
                                event.preventDefault();
                                $(this).parent().remove();
                                updateHiddenInput();
                            });

                            tag.append(del);
                            tag.insertBefore(me);
                            updateHiddenInput();
                        }
                    };

                    var updateHiddenInput = function() {
                        var tagsArray = methods.getTagsArray.apply(me);
                        $('#hidden-tags-input').val(tagsArray.join(','));
                    };

                    // Initialize initial tags from opts.tags
                    $.each(opts.tags, function(i, e) {
                        addTag(e);
                    });

                    me.blur(function() {
                        addTag(this.value);
                        this.value = '';
                    });

                    me.keyup(function(e) {
                        var key = e.keyCode;
                        var isEnter = key == 13;
                        var isComma = key == 188;
                        var isBack = key == 8;

                        if (isEnter || isComma) {
                            addTag(this.value);
                            this.value = '';
                        }
                        if (isBack && me.data('delete-prev')) {
                            me.prev().remove();
                            me.data('delete-prev', false);
                            updateHiddenInput();
                        } else if (isBack && this.value === '') {
                            me.data('delete-prev', true);
                        }
                    });
                });
            },
            get: function() {
                return $('.tag span', this.parent()).map(function() {
                    return $(this).text();
                }).get(); // Convert jQuery collection to a plain array
            },
            clear: function() {
                $('div', this).remove();
                updateHiddenInput();
            },
            getTagsArray: function() {
                return $('.tag span', this.parent()).map(function() {
                    return $(this).text();
                }).get(); // Convert jQuery collection to a plain array
            },
        };
        $.fn.tagcloud = function(method) {
            if (methods[method]) {
                return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
            } else if (typeof method === 'object' || !method) {
                return methods.init.apply(this, arguments);
            } else if (method === 'getTagsArray') {
                return methods.getTagsArray.apply(this);
            } else {
                $.error('Method ' + method + ' does not exist on tagcloud plugin');
            }
        };
    })(jQuery);
    $(document).ready(function() {
        $('.tags').tagcloud({
            tags: [],
        });
    });
</script>
        <script>
    
                $(document).ready(function() {
            $('input[name=plan_logo]').change(function(){
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
            });
       </script>

 
       @endpush
    