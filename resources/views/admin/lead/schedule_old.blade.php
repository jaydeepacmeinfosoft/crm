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
                        <h5>Clients Name</h5>
                    </div>
                </div>

                <div class="card-body">
                    <div class="flex-grow-1">
                      <!-- <h4 class="fw-bold"><span class="text-muted fw-light">Client Info</h4> -->
        
                      <div class="row mb-4">
                        <div class="d-flex justify-content-left mx-auto gap-3">
                          <a href="#" class="btn btn-primary waves-effect waves-light">Assigned to you</a>
                          <a href="#" class="btn btn-primary waves-effect waves-light">Follow Up in 12 Days </a>
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
                                      <h6 class="mb-0">DISPLAY NAME</h6>
                                      <small class="text-muted">Sivananda Yoga Centre</small>
                                    </div>
                                    <div class="col-3 text-end">
                                      <div class="">
                                        <a href="#" target="_blank"><img src="{{ url("admins/assets/img/icons/brands/user-icon.png")}}" alt="user" class="me-3" height="38"></a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="flex-grow-1 row p-3">
                                    <div class="col-9 mb-2">
                                      <h6 class="mb-0">MOBILE  NUMBER</h6>
                                      <small class="text-muted">+91 9818990014</small>
                                    </div>
                                    <div class="col-3 text-end">
                                      <div class="">
                                        <a href="tel:+919818990014"><img src="{{ url("admins/assets/img/icons/brands/phone-icon.png")}}" alt="phone" class="me-3" height="38"></a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="flex-grow-1 row p-3">
                                    <div class="col-9 mb-2">
                                      <h6 class="mb-0">WHATSAPP NUMBER</h6>
                                      <small class="text-muted">+91 9818990014</small>
                                    </div>
                                    <div class="col-3 text-end">
                                      <div class="" data-bs-toggle="modal" data-bs-target="#savelogaction1Modal">
                                        <a href="https://wa.me/919818990014" target="_blank"><img src="{{ url("admins/assets/img/icons/brands/whatsapp-icon.png")}}" alt="whatsapp" class="me-3" height="38"></a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="flex-grow-1 row p-3">
                                    <div class="col-9 mb-2">
                                      <h6 class="mb-0">EMAIL ADDRESS</h6>
                                      <small class="text-muted">yogashowstheway@yahoo.com</small>
                                    </div>
                                    <div class="col-3 text-end">
                                      <div class="">
                                        <a href="mailto:yogashowstheway@yahoo.com" target="_blank"><img src="{{ url("admins/assets/img/icons/brands/email-icon.png")}}" alt="whatsapp" class="me-3" height="38"></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              <div class="col-7">
                                <div class="card-body pb-0 px-0" data-bs-toggle="modal"
                                data-bs-target="#noteaddNewCCModal">
                                  <h5 class="card-title mb-0">NOTE</h5>
                                  <p class="mb-3">To Get National/International inquiries Enroll your retreats with yogliving.comTo Get National/International inquiries Enroll your retreats with yogliving.com</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!--/ Last Transaction -->
        
                        <!-- Activity Timeline -->
                        <div class="col-lg-4 col-md-12 mb-4">
                          <div class="card">
                            <div class="card-header d-flex justify-content-between" data-bs-toggle="modal"
                            data-bs-target="#addScheduleModal">
                              <h5 class="card-title m-0 me-2 pt-1 mb-2 add-activity">
                                <i class="ti ti-plus ti-sm text-muted"></i> Add Activity
                              </h5>
                            </div>
                            <div class="card-body pb-0">
                              <ul class="timeline ms-1 mb-0">
                                <li class="timeline-item timeline-item-transparent ps-4">
                                  <a href="#"><span class="timeline-indicator timeline-indicator-success">
                                    <i class="ti ti-circle-check"></i>
                                  </span>
                                  <div class="timeline-event">
                                    <div class="timeline-header">
                                      <h6 class="mb-0">Client Meeting</h6>
                                      <small class="text-muted">Today</small>
                                    </div>
                                    <p class="mb-2">Project meeting with Bipin Patel @10:15am</p>
                                    <div class="d-flex flex-wrap">
                                      <span><i class="ti ti-user-check"></i> by Username</span>
                                    </div>
                                  </div>
                                </a>
                                </li>
                                <li class="timeline-item timeline-item-transparent ps-4">
                                  <a href="#">
                                    <span class="timeline-indicator timeline-indicator-primary">
                                    <i class="ti ti-map-pin"></i>
                                  </span>
                                  <div class="timeline-event">
                                    <div class="timeline-header">
                                      <h6 class="mb-0">Create a new project for client</h6>
                                      <small class="text-muted">2 Day Ago</small>
                                    </div>
                                    <p class="mb-0">Add files to new design folder</p>
                                    <div class="d-flex flex-wrap">
                                      <span><i class="ti ti-user-check"></i> by Username</span>
                                    </div>
                                  </div>
                                </a>
                                </li>
                                <li class="timeline-item timeline-item-transparent ps-4">
                                  <span class="timeline-indicator timeline-indicator-info">
                                    <i class="ti ti-phone"></i>
                                  </span>
                                  <div class="timeline-event">
                                    <div class="timeline-header">
                                      <h6 class="mb-0">Shared 2 New Project Files</h6>
                                      <small class="text-muted">6 Day Ago</small>
                                    </div>
                                    <p class="mb-2">
                                      Sent by Mollie Dixon
                                    </p>
                                    <div class="d-flex flex-wrap">
                                      <span><i class="ti ti-user-check"></i> by Username</span>
                                    </div>
                                  </div>
                                </li>
                                <li class="timeline-item timeline-item-transparent ps-4 border-0">
                                  <span class="timeline-indicator timeline-indicator-success">
                                    <i class="ti ti-circle-check"></i>
                                  </span>
                                  <div class="timeline-event pb-0">
                                    <div class="timeline-header">
                                      <h6 class="mb-0">Client added to crm</h6>
                                      <small class="text-muted">10 Day Ago</small>
                                    </div>
                                  </div>
                                </li>
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
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                    <div class="text-center"><h5>Message</h5></div>
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
                  <label for="selectpickerIcons" class="form-label">Select</label>
                  <select class="selectpicker w-100 h-16" id="selectType" data-icon-base="ti" data-tick-icon="ti-check" data-style="btn-default">
                    <option data-icon="ti ti-large ti-phone" value="Phone Call"></option>
                    <option data-icon="ti ti-large ti-messages" value="Message"></option>
                    <option data-icon="ti ti-large ti-calendar" value="Meeting"></option>
                    <option data-icon="ti ti-large ti-file" value="Note"></option>
                  </select>
                </div>
                <!-- Subtext -->
                <div class="col-md-9 mb-4">
                  <label for="selectpickerSubtext" class="form-label">Hiteshbhai - Select Icon And Write Automatic Type</label>
                  <input class="form-control h-16" type="text" value="" id="schedule-type-text" placeholder="Phone Call / Message / Meeting / Note">
                </div>
                <div class="col-md-12 mb-4">
                  <div>
                    <label for="exampleFormControlTextarea1" class="form-label">Add Your Message</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                  </div>
                </div>
                <div class="col-md-12 mb-4">
                  <label for="exampleFormControlTextarea1" class="form-label">Select Date & Time</label>
                  <input class="form-control h-16" type="datetime-local" value="2021-06-18T12:30:00" id="html5-datetime-local-input">
                </div>
                <div class="d-grid">
                  <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="ti ti-file-description"></i> SAVE</button>
                </div>
              </div>
            </div>
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
            <div class="text-center mb-4">
              <h3 class="mb-2">Save to Timeline?</h3>
            </div>
            <div class="row bg-1 p-2">
              <div class="text-Left mb-4">
                <h3 class="mb-2"> <i class="ti ti-messages"></i> Message via WhatsApp</h3>
              </div>
              <div class="col-md-12 mb-4">
                  <label for="exampleFormControlTextarea1" class="form-label">Add Your Message</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
              </div>
              <div class="d-grid mb-4">
                <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="ti ti-check"></i> LOG ACTIVITY</button>
              </div>
              <div class="d-grid mb-4">
                <button type="submit" class="btn btn-default waves-effect waves-light"> DISCARD</button>
              </div>
            </div>
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

        $('#selectType').on('change', function () {
            var selectedValue = $(this).val();
            $('#schedule-type-text').val(selectedValue);
        });
    </script>
@endpush

