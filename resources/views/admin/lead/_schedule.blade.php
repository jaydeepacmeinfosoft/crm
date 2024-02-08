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
                      <h4 class="fw-bold"><span class="text-muted fw-light">Client Info</h4>
        
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
                                      <div class="">
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
                              <h5 class="card-title m-0 me-2 pt-1 mb-2">
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
    
    <div class="modal fade" id="addScheduleModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-xl modal-simple modal-pricing">
                <div class="modal-content">
                  <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h2>Add Activity</h2>
                    <h3>with Test Lead</h3>
                    <p>Please select the type of activity you want to add</p>
                    <div class="grid gap-4 grid-cols-4 pt-6">
                    	<div class="w-full h-36 flex flex-col items-center justify-center cursor-pointer border bg-gray border-gray-100 hover:bg-primary-light text-center">
                    		<div class="pb-5">
                    			<div class="h-9 w-9 rounded-full flex items-center justify-items-center bg-privyr-4">
                    		    <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="phone" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="text-white mx-auto svg-inline--fa fa-phone fa-w-16"><path fill="currentColor" d="M476.5 22.9L382.3 1.2c-21.6-5-43.6 6.2-52.3 26.6l-43.5 101.5c-8 18.6-2.6 40.6 13.1 53.4l40 32.7C311 267.8 267.8 311 215.4 339.5l-32.7-40c-12.8-15.7-34.8-21.1-53.4-13.1L27.7 329.9c-20.4 8.7-31.5 30.7-26.6 52.3l21.7 94.2c4.8 20.9 23.2 35.5 44.6 35.5C312.3 512 512 313.7 512 67.5c0-21.4-14.6-39.8-35.5-44.6zM69.3 464l-20.9-90.7 98.2-42.1 55.7 68.1c98.8-46.4 150.6-98 197-197l-68.1-55.7 42.1-98.2L464 69.3C463 286.9 286.9 463 69.3 464z" class=""></path></svg>
                    			</div>
                    		</div> 
                    		<div class="font-medium text-base">Phone Call</div>
                    	</div>
                    	<div class="w-full h-36 flex flex-col items-center justify-center cursor-pointer border bg-gray border-gray-100 hover:bg-primary-light text-center activity-type" data-activity-type="message">
                    		<div class="pb-5">
                    			<div class="h-9 w-9 rounded-full flex items-center justify-items-center bg-privyr-6">
                    				<svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="comment" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="text-white mx-auto svg-inline--fa fa-comment fa-w-16">
                    				<path fill="currentColor" d="M256 32C114.6 32 0 125.1 0 240c0 47.6 19.9 91.2 52.9 126.3C38 405.7 7 439.1 6.5 439.5c-6.6 7-8.4 17.2-4.6 26S14.4 480 24 480c61.5 0 110-25.7 139.1-46.3C192 442.8 223.2 448 256 448c141.4 0 256-93.1 256-208S397.4 32 256 32zm0 368c-26.7 0-53.1-4.1-78.4-12.1l-22.7-7.2-19.5 13.8c-14.3 10.1-33.9 21.4-57.5 29 7.3-12.1 14.4-25.7 19.9-40.2l10.6-28.1-20.6-21.8C69.7 314.1 48 282.2 48 240c0-88.2 93.3-160 208-160s208 71.8 208 160-93.3 160-208 160z" class=""></path></svg>
                    			</div>
                    		</div> 
                    		<div class="font-medium text-base">Message</div>
                    	</div>
                    	<div class="w-full h-36 flex flex-col items-center justify-center cursor-pointer border bg-gray border-gray-100 hover:bg-primary-light text-center">
                    		<div class="pb-5">
                    			<div class="h-9 w-9 rounded-full flex items-center justify-items-center bg-privyr-3">
                    				<svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="calendar-day" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="text-white mx-auto svg-inline--fa fa-calendar-day fa-w-14">
                    					<path fill="currentColor" d="M112 368h96c8.8 0 16-7.2 16-16v-96c0-8.8-7.2-16-16-16h-96c-8.8 0-16 7.2-16 16v96c0 8.8 7.2 16 16 16zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zm0 394c0 3.3-2.7 6-6 6H54c-3.3 0-6-2.7-6-6V160h352v298z" class=""></path>
                    				</svg>
                    			</div>
                    		</div> 
                    		<div class="font-medium text-base">Meeting</div>
                    	</div>
                    	<div class="w-full h-36 flex flex-col items-center justify-center cursor-pointer border bg-gray border-gray-100 hover:bg-primary-light text-center">
                    		<div class="pb-5">
                    			<div class="h-9 w-9 rounded-full flex items-center justify-items-center bg-privyr-5">
                    				<svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="sticky-note" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="text-white mx-auto svg-inline--fa fa-sticky-note fa-w-14">
                    					<path fill="currentColor" d="M448 348.106V80c0-26.51-21.49-48-48-48H48C21.49 32 0 53.49 0 80v351.988c0 26.51 21.49 48 48 48h268.118a48 48 0 0 0 33.941-14.059l83.882-83.882A48 48 0 0 0 448 348.106zm-128 80v-76.118h76.118L320 428.106zM400 80v223.988H296c-13.255 0-24 10.745-24 24v104H48V80h352z" class=""></path>
                    				</svg>
                    			</div>
                    		</div> 
                    		<div class="font-medium text-base">Note</div>
                    	</div>
                    </div>
                    <div class="activity-schedule phone-call" style="display:none">
                        <p>here make design</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection
@push('script')
    <script>
        $(document).on('click', '.activity-type', function() {
            var activityType = $(this).attr("data-activity-type");
            alert(activityType);
            
        });
    </script>
@endpush

