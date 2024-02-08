@extends('admin.layouts.app')
@section('title', 'Dashboard - CRM')

<style>
  .pt-6 {
    padding-top: 1.5rem;
  }

  .gap-4 {
    gap: 1.5rem !important;
  }

  .grid {
    display: grid;
  }

  .grid-cols-4 {
    grid-template-columns: repeat(4, minmax(0, 1fr));
  }
</style>
@section('content')
<div class="container-fluid">
  <div class="row">
    <!-- Bordered Table -->
    <div class="card mt-4">
      <div class="card-header row">
        <div class="col-md-11 col-12">
          <h5>{{@$clientinfo->company_name}}</h5>
        </div>
      </div>

      <div class="card-body">
        <div class="flex-grow-1">
          <!-- <h4 class="fw-bold"><span class="text-muted fw-light">Client Info</h4> -->
          @php
          $username=App\Models\User::where('id',$clientinfo->assign_userid)->select('name')->first();
          $discription =App\Models\Activity::select('description')->first();
          @endphp

          <div class="row mb-4">
            <div class="d-flex justify-content-left mx-auto gap-3">
              <a href="#" class="btn btn-primary waves-effect waves-light">Assigned to {{$username->name}}</a>
              <!--<a href="#" class="btn btn-primary waves-effect waves-light">Follow Up in 12 Days </a>-->
            </div>
          </div>

          <div class="row">
            <!-- Last Transaction -->
            <div class="col-md-8 mb-4">
              <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                  <h5 class="card-title m-0 me-2">Client Info</h5>
                </div>
                <div class="d-flex row mb-3">

                  <div class="col-5">
                    <div class="flex-grow-1 row p-3">
                      <div class="col-9 mb-2">
                        <h6 class="mb-0"> NAME</h6>
                        <small class="text-muted">{{@$clientinfo-> vFullname}}</small>
                      </div>
                      <div class="col-3 text-end">
                        <div class="">
                          <a href="#" target="_blank"><img src="{{ url("admins/assets/img/icons/brands/user-icon.png")}}" alt="user" class="me-3" height="38"></a>
                        </div>
                      </div>
                    </div>
                    <div class="flex-grow-1 row p-3">
                      <div class="col-9 mb-2">
                        <h6 class="mb-0">MOBILE NUMBER</h6>
                        <small class="text-muted">{{@$clientinfo-> vWhatsapp}}</small>
                      </div>
                      <div class="col-3 text-end">
                        <div class="">
                          <a href="tel:{{@$clientinfo->	vWhatsapp}}"><img src="{{ url("admins/assets/img/icons/brands/phone-icon.png")}}" alt="phone" class="me-3" height="38"></a>
                        </div>
                      </div>
                    </div>
                    <div class="flex-grow-1 row p-3">
                      <div class="col-9 mb-2">
                        <h6 class="mb-0">WHATSAPP NUMBER</h6>
                        <small class="text-muted">{{@$clientinfo-> vWhatsapp}}</small>
                      </div>
                      <div class="col-3 text-end">
                        <div class="" data-bs-toggle="modal" data-bs-target="#savelogaction1Modal">
                          <a href="https://wa.me/{{@$clientinfo->	vWhatsapp}}" target="_blank"><img src="{{ url("admins/assets/img/icons/brands/whatsapp-icon.png")}}" alt="whatsapp" class="me-3" height="38"></a>
                        </div>
                      </div>
                    </div>
                    <div class="flex-grow-1 row p-3">
                      <div class="col-9 mb-2">
                        <h6 class="mb-0">EMAIL ADDRESS</h6>
                        <small class="text-muted">{{@$clientinfo->vEmail}}</small>
                      </div>
                      <div class="col-3 text-end">
                        <div class="">
                          <a href="mailto:{{@$clientinfo->vEmail}}" target="_blank"><img src="{{ url("admins/assets/img/icons/brands/email-icon.png")}}" alt="whatsapp" class="me-3" height="38"></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-7">
                    <div class="card-body pb-0 px-0" data-bs-toggle="modal" data-bs-target="#noteaddNewCCModal">
                      <h5 class="card-title mb-0">NOTE</h5>
                      <p class="mb-3">{{$discription->description}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--/ Last Transaction -->

            <!-- Activity Timeline -->
            <div class="col-lg-4 col-md-12 mb-4">
              <div class="card">
                <div class="card-header d-flex justify-content-between" data-bs-toggle="modal" data-bs-target="#addScheduleModal">
                  <h5 class="card-title m-0 me-2 pt-1 mb-2 add-activity">
                    <i class="ti ti-plus ti-sm text-muted"></i> Add Activity
                  </h5>
                </div>
                <div class="card-body pb-0">
                  <ul class="timeline ms-1 mb-0">


                  
                    <?php
               
                    foreach ($activityList as $key =>  $activity) {
                      $link = "";
                      $iconCls = "";
                      $actMessage = "";
                      $todayDate = date("Y-m-d");
                      $datetime1 = new DateTime();
                      $datetime2 = new DateTime($activity->schedule);
                      $difference = $datetime1->diff($datetime2);

                      $isLastIteration = ($key === count($activityList) - 1);
                      $borderClass = ($isLastIteration) ? 'border-0' : '';
                      if ($activity->activity_type == "Call") {
                        $link = "tel: " . $activity->location;
                        $iconCls = "ti ti-phone";
                        $actMessage = "Call at " . date("d M, Y  ", strtotime($activity->schedule));
                      }
                      if ($activity->activity_type == "Whatsapp") {
                        $link = "https://wa.me/" . $activity->location . "?text=I'm%20interested%20in%20your%20car%20for%20sale";
                        $message = $activity->description;
                        $iconCls = "ti ti-circle";
                        $actMessage = "Whatspp chat at " . date("d M, Y ", strtotime($activity->schedule));
                      }
                      if ($activity->activity_type == "Email") {
                        $link = "mailto:" . $activity->location;
                        $iconCls = "ti ti-mail";
                        $actMessage = "Email at " . date("d M, Y ", strtotime($activity->schedule));
                      }
                      if ($activity->activity_type == "Meeting") {
                        $link = $activity->location;
                        $iconCls = "ti ti-circle-check";

                        $actMessage = "Meeting at " . date("d M, Y ", strtotime($activity->schedule));
                      }
                      if ($activity->activity_type == "Message") {
                        $link = $activity->location;
                        $iconCls = "ti ti-message";

                        $actMessage = "Message at " . date("d M, Y  ", strtotime($activity->schedule));
                      }
                      if ($activity->activity_type == "Note") {
                        $link = $activity->location;
                        $iconCls = "ti ti-note";

                        $actMessage = "Note at " . date("d M, Y  ", strtotime($activity->schedule));
                      }
                    ?>
                      <div class="descriptionnote" id="distype">
                      <li class="timeline-item timeline-item-transparent ps-4 <?php echo $borderClass; ?>">
                        <a href="#"><span class="timeline-indicator timeline-indicator-success">
                            <i class=" {{ $iconCls }} "></i>
                          </span>
                          <div class="timeline-event">
                            <div class="timeline-header">
                              <h6 class="mb-0">{{$activity->activity_type}}</h6>
                              <small class="text-muted">{{ ($difference->d??"").' days ' }}</small>
                            </div>

                            <p class="mb-2" value=""> {{ $actMessage }}</p>

                            <span><a href="{{$link}}" target="_blank">{{$activity->location}}</a></span>


                            <!-- <div class="d-flex flex-wrap">
                                      <span><i class="ti ti-user-check"></i> by Username</span>
                                    </div> -->
                          </div>
                        </a>
                      </li>
                    <?php } ?>

                    </div>
                  </ul>
                </div>
              </div>
            </div>
            <!--/ Activity Timeline -->

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- -----start schedule activity model----- -->
<div class="modal fade" id="addScheduleModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md modal-simple modal-refer-and-earn">
    <div class="modal-content" style="padding: 20px">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="resetform"></button>
        <div class="activity-type">
          <div class="text-center mb-4">
            <h3 class="mb-2">Add Activity</h3>
            <p class="text-muted text-center mb-5 w-75 m-auto">
              with Acme Infosoft
            </p>
            <p class="text-muted text-center mb-5 w-75 m-auto">
              Please select the type of activity you want to add
            </p>
          </div>
          <div class="row">
            <div class="col-12 col-lg-3 px-3">
              <div class="d-flex justify-content-center mb-2 schedule-activity" data-activity-type="Phone Call">
                <div class="modal-refer-and-earn-step bg-label-primary">
                  <i class="ti ti-phone"></i>
                </div>
              </div>
              <div class="text-center">
                <h5>Phone Call</h5>
              </div>
            </div>
            <div class="col-12 col-lg-3 px-3">
              <div class="d-flex justify-content-center mb-2 schedule-activity" data-activity-type="Message">
                <div class="modal-refer-and-earn-step bg-label-primary">
                  <i class="ti ti-messages"></i>
                </div>
              </div>
              <div class="text-center">
                <h5>Message</h5>
              </div>
            </div>
            <div class="col-12 col-lg-3 px-3">
              <div class="d-flex justify-content-center mb-2 schedule-activity" data-activity-type="Meeting">
                <div class="modal-refer-and-earn-step bg-label-primary">
                  <i class="ti ti-calendar"></i>
                </div>
              </div>
              <div class="text-center">
                <h5>Meeting</h5>
              </div>
            </div>
            <div class="col-12 col-lg-3 px-3">
              <div class="d-flex justify-content-center mb-2 schedule-activity" data-activity-type="Note">
                <div class="modal-refer-and-earn-step bg-label-primary">
                  <i class="ti ti-file"></i>
                </div>
              </div>
              <div class="text-center">
                <h5>Note</h5>
              </div>
            </div>
          </div>
        </div>
        <!-- ---start activity form---- -->
        <form id="activtyform" method="post" action="">
          @csrf
          <input type="hidden" name="lead_id" value="{{$clientinfo->	iid}}">
          <!--<input type="hidden" name="location" value="{{@$clientinfo->	vWhatsapp}}">-->
          <div class="activity-form" style="display: none">
            <div class="text-center mb-4">
              <h3 class="mb-2">Add Activity - Call or message- phone </h3>
              <p class="text-muted text-center mb-5 w-75 m-auto">
                with Acme Infosoft
              </p>
            </div>
            <div class="row bg-1 p-2">

              <!-- Icons -->
              <div class="col-md-3 mb-4">
                <label for="selectType" class="form-label">Select</label>
                <select class="selectpicker w-100 h-16" name="activity_type" id="selectType" data-icon-base="ti" data-tick-icon="ti-check" data-style="btn-default">
                  <option data-icon="ti ti-large ti-phone" value="Call"></option>
                  <option data-icon="ti ti-large ti-messages" value="Message"></option>
                  <option data-icon="ti ti-large ti-calendar" value="Meeting"></option>
                  <option data-icon="ti ti-large ti-file" value="Note"></option>
                </select>
              </div>
              <!-- Subtext -->
              <div class="col-md-9 mb-4">
                <label for="selectpickerSubtext" class="form-label"></label>
                <input class="form-control h-16" type="text" value="" id="schedule-type-text" placeholder="Phone Call / Message / Meeting / Note">
              </div>
              <div class="col-md-12 mb-4">
                <div>
                  <label for="exampleFormControlTextarea1" class="form-label">Add Your Message</label>
                  <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5"></textarea>
                </div>
              </div>
              <div class="col-md-12 mb-4">
                <label for="exampleFormControlTextarea1" class="form-label">Select Date</label>
                <input class="form-control h-16" name="schedule" type="date" value="" placeholder="select Date & Time" id="html5-datetime-local-input">
              </div>


              <div class="col-md-12 mb-4" id="meetingLinkContainer" style="display: none;">
                <label for="meetingLink" class="form-label">Meeting Link</label>
                <input class="form-control h-16" type="text" value="" name="location">
              </div>

              <div class="d-grid">
                <button type="submit" id="saveSchedule" class="btn btn-primary waves-effect waves-light"><i class="ti ti-file-description"></i> SAVE</button>
              </div>
            </div>
          </div>
        </form>
        <!-- ---end activity form---- -->
      </div>
    </div>
  </div>
</div>


<!-- -----end schedule activity model----- -->

<!-- Save Log Timeline Activity model-->
<div class="modal fade" id="savelogaction1Modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md modal-simple modal-refer-and-earn">
    <div class="modal-content p-0 p-md-1">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <form method="post" id="activityForm" action="">
          @csrf
          <div class="text-center mb-4">
            <h3 class="mb-2">Save to Timeline?</h3>
          </div>
          <div class="row bg-1 p-2">
            <div class="text-Left mb-4">
              <h3 class="mb-2"> <i class="ti ti-messages"></i> Message via WhatsApp</h3>
            </div>
            <div class="col-md-12 mb-4">
              <!-- ------------ add by manali -------- -->
              <input type="hidden" name="lead_id" value="{{$clientinfo->	iid}}">
              <input type="hidden" name="location" value="{{$clientinfo-> vWhatsapp	}}">

              <input type="hidden" name="activity_type" value="Whatsapp">
              <!-- // -->
              <label for="exampleFormControlTextarea1" class="form-label">Add Your Message</label>
              <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5" required></textarea>
            </div>
            <div class="d-grid mb-4">
              <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="ti ti-check"></i> LOG ACTIVITY</button>
            </div>
            <div class="d-grid mb-4">
              <button type="cancel" class="btn btn-default waves-effect waves-light" id="closemodal"> DISCARD</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('script')
<script>
  $(document).on('click', '.add-activity', function() {
    $('.activity-form').hide();
    $('.activity-type').show();
  });

  $(document).on('click', '.schedule-activity', function() {
    var activityType = $(this).data("activity-type");
    $('.activity-form').show();
    $('.activity-type').hide();

    $('#schedule-type-text').val(activityType);
    $('#selectType').selectpicker('val', activityType);
  });

  $('#selectType').on('change', function() {
    var selectedValue = $(this).val();
    $('#schedule-type-text').val(selectedValue);
  });
</script>
<!-- Add by manali Joshi  -->
<script>
  $(document).ready(function() {
    $('#selectType').change(function() {
      var selectedOption = $(this).val();
      if (selectedOption === 'Meeting') {
        $('#meetingLinkContainer').show();
      } else {
        $('#meetingLinkContainer').hide();
      }
    });

  });
</script>
<script>
  function submitForm() {
    // Assuming you have an ID for your modal, like 'savelogaction1Modal'
    $('#savelogaction1Modal').modal('hide');
  }
  $(document).ready(function() {

    $(document).on('submit', '#activityForm', function(event) {
      event.preventDefault();
      var formData = new FormData(this);
      var url = $(this).attr("action");

      var csrfToken = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: "{{ route('whatsup_schedule') }}",
        type: 'POST',
        processData: false,
        contentType: false,
        data: formData,
        headers: {
          'X-CSRF-TOKEN': csrfToken
        },
        success: function(result) {
          $(".errMsg").empty();
          if (result) {
            // Show success message here
            // Example: $(".successMessage").text("Activity Added Successfully");
          }

          // Close the modal
          if (result) {

            submitForm();
          }


          // Reload the page
          window.location.href = window.location.href;
        },
        error: function(data) {
          if (data.responseJSON) {
            $(".errMsg").empty();
            $("#errMessage").removeClass("d-none");
            $.each(data.responseJSON.errors, function(key, value) {
              var errMsg = "<h6 class='text-danger'>" + value[0] + "</h6>";
              $("#" + key + "_err").html(errMsg);
            });
          }
        }
      });
      $('#savelogaction1Modal').modal('hide');
      window.location.reload();
    });
  });

  $('#closemodal').click(function() {
    $('#savelogaction1Modal').modal('hide');
    window.location.reload();
  });
</script>

<script>
  function submitForm() {
    // Assuming you have an ID for your modal, like 'savelogaction1Modal'
    $('#savelogaction1Modal').modal('hide');
  }
  $(document).ready(function() {

    $(document).on('submit', '#activtyform', function(event) {
      event.preventDefault();
      var formData = new FormData(this);
      var url = $(this).attr("action");

      var csrfToken = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: "{{ route('add_schedule') }}",
        type: 'POST',
        processData: false,
        contentType: false,
        data: formData,
        headers: {
          'X-CSRF-TOKEN': csrfToken
        },
        success: function(result) {
          $(".errMsg").empty();
          if (result) {
            // Show success message here
            // Example: $(".successMessage").text("Activity Added Successfully");
          }

          // Close the modal
          if (result) {

            submitForm();
          }


          // Reload the page
          window.location.href = window.location.href;
        },
        error: function(data) {
          if (data.responseJSON) {
            $(".errMsg").empty();
            $("#errMessage").removeClass("d-none");
            $.each(data.responseJSON.errors, function(key, value) {
              var errMsg = "<h6 class='text-danger'>" + value[0] + "</h6>";
              $("#" + key + "_err").html(errMsg);
            });
          }
        }
      });
      $('#addScheduleModal').modal('hide');
      window.location.reload();
    });
  });
  $('#resetform').click(function() {
    $("#activtyform").trigger("reset");

  });
</script>
@endpush