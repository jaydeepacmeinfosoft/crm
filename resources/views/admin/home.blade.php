@extends('admin.layouts.app')
@section('title',"Dashboard - CRM")
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <!-- Sales last year -->
      <div class="col-xl-2 col-md-4 col-6 mb-4">
        <div class="card">
          <div class="card-header pb-0">
            <h5 class="card-title mb-0">Sales</h5>
            <small class="text-muted">Last Year</small>
          </div>
          <div id="salesLastYear"></div>
          <div class="card-body pt-0">
            <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
              <h4 class="mb-0">175k</h4>
              <small class="text-danger">-16.2%</small>
            </div>
          </div>
        </div>
      </div>

      <!-- Sessions Last month -->
      <div class="col-xl-2 col-md-4 col-6 mb-4">
        <div class="card">
          <div class="card-header pb-0">
            <h5 class="card-title mb-0">Sessions</h5>
            <small class="text-muted">Last Month</small>
          </div>
          <div class="card-body">
            <div id="sessionsLastMonth"></div>
            <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
              <h4 class="mb-0">45.1k</h4>
              <small class="text-success">+12.6%</small>
            </div>
          </div>
        </div>
      </div>

      <!-- Total Profit -->
      <div class="col-xl-2 col-md-4 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="badge p-2 bg-label-danger mb-2 rounded">
              <i class="ti ti-currency-dollar ti-md"></i>
            </div>
            <h5 class="card-title mb-1 pt-2">Total Profit</h5>
            <small class="text-muted">Last week</small>
            <p class="mb-2 mt-1">1.28k</p>
            <div class="pt-1">
              <span class="badge bg-label-secondary">-12.2%</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Total Sales -->
      <div class="col-xl-2 col-md-4 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="badge p-2 bg-label-info mb-2 rounded"><i class="ti ti-chart-bar ti-md"></i></div>
            <h5 class="card-title mb-1 pt-2">Total Sales</h5>
            <small class="text-muted">Last week</small>
            <p class="mb-2 mt-1">$4,673</p>
            <div class="pt-1">
              <span class="badge bg-label-secondary">+25.2%</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Revenue Growth -->
      <div class="col-xl-4 col-md-8 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="d-flex flex-column">
                <div class="card-title mb-auto">
                  <h5 class="mb-1 text-nowrap">Revenue Growth</h5>
                  <small>Weekly Report</small>
                </div>
                <div class="chart-statistics">
                  <h3 class="card-title mb-1">$4,673</h3>
                  <span class="badge bg-label-success">+15.2%</span>
                </div>
              </div>
              <div id="revenueGrowth"></div>
            </div>
          </div>
        </div>
      </div>



      <!-- Last Transaction -->
      <div class="col-lg-6 mb-4 mb-lg-0">
        <div class="card h-100">
          <div class="card-header d-flex justify-content-between">
            <h5 class="card-title m-0 me-2">Last Transaction</h5>
            <div class="dropdown">
              <button
                class="btn p-0"
                type="button"
                id="teamMemberList"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false">
                <i class="ti ti-dots-vertical ti-sm text-muted"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="teamMemberList">
                <a class="dropdown-item" href="javascript:void(0);">Download</a>
                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                <a class="dropdown-item" href="javascript:void(0);">Share</a>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-borderless border-top">
              <thead class="border-bottom">
                <tr>
                  <th>CARD</th>
                  <th>DATE</th>
                  <th>STATUS</th>
                  <th>TREND</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="d-flex justify-content-start align-items-center">
                      <div class="me-3">
                        <img src="../../assets/img/icons/payments/visa-img.png" alt="Visa" height="30" />
                      </div>
                      <div class="d-flex flex-column">
                        <p class="mb-0 fw-semibold">*4230</p>
                        <small class="text-muted">Credit</small>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex flex-column">
                      <p class="mb-0 fw-semibold">Sent</p>
                      <small class="text-muted text-nowrap">17 Mar 2022</small>
                    </div>
                  </td>
                  <td><span class="badge bg-label-success">Verified</span></td>
                  <td>
                    <p class="mb-0 fw-semibold">+$1,678</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex justify-content-start align-items-center">
                      <div class="me-3">
                        <img
                          src="../../assets/img/icons/payments/master-card-img.png"
                          alt="Visa"
                          height="30" />
                      </div>
                      <div class="d-flex flex-column">
                        <p class="mb-0 fw-semibold">*5578</p>
                        <small class="text-muted">Credit</small>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex flex-column">
                      <p class="mb-0 fw-semibold">Sent</p>
                      <small class="text-muted text-nowrap">12 Feb 2022</small>
                    </div>
                  </td>
                  <td><span class="badge bg-label-danger">Rejected</span></td>
                  <td>
                    <p class="mb-0 fw-semibold">-$839</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex justify-content-start align-items-center">
                      <div class="me-3">
                        <img
                          src="../../assets/img/icons/payments/american-express-img.png"
                          alt="Visa"
                          height="30" />
                      </div>
                      <div class="d-flex flex-column">
                        <p class="mb-0 fw-semibold">*4567</p>
                        <small class="text-muted">Credit</small>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex flex-column">
                      <p class="mb-0 fw-semibold">Sent</p>
                      <small class="text-muted text-nowrap">28 Feb 2022</small>
                    </div>
                  </td>
                  <td><span class="badge bg-label-success">Verified</span></td>
                  <td>
                    <p class="mb-0 fw-semibold">+$435</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex justify-content-start align-items-center">
                      <div class="me-3">
                        <img src="../../assets/img/icons/payments/visa-img.png" alt="Visa" height="30" />
                      </div>
                      <div class="d-flex flex-column">
                        <p class="mb-0 fw-semibold">*5699</p>
                        <small class="text-muted">Credit</small>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex flex-column">
                      <p class="mb-0 fw-semibold">Sent</p>
                      <small class="text-muted text-nowrap">8 Jan 2022</small>
                    </div>
                  </td>
                  <td><span class="badge bg-label-secondary">Pending</span></td>
                  <td>
                    <p class="mb-0 fw-semibold">+$2,345</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex justify-content-start align-items-center">
                      <div class="me-3">
                        <img src="../../assets/img/icons/payments/visa-img.png" alt="Visa" height="30" />
                      </div>
                      <div class="d-flex flex-column">
                        <p class="mb-0 fw-semibold">*5699</p>
                        <small class="text-muted">Credit</small>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex flex-column">
                      <p class="mb-0 fw-semibold">Sent</p>
                      <small class="text-muted text-nowrap">8 Jan 2022</small>
                    </div>
                  </td>
                  <td><span class="badge bg-label-danger">Rejected</span></td>
                  <td>
                    <p class="mb-0 fw-semibold">-$234</p>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Activity Timeline -->
      <div class="col-lg-6 col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h5 class="card-title m-0 me-2 pt-1 mb-2">Activity Timeline</h5>
            <div class="dropdown">
              <button
                class="btn p-0"
                type="button"
                id="timelineWapper"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false">
                <i class="ti ti-dots-vertical ti-sm text-muted"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="timelineWapper">
                <a class="dropdown-item" href="javascript:void(0);">Download</a>
                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                <a class="dropdown-item" href="javascript:void(0);">Share</a>
              </div>
            </div>
          </div>
          <div class="card-body pb-0">
            <ul class="timeline ms-1 mb-0">
            <?php
           
                foreach($activityList as $activity){
                    $link = "";
                    $iconCls = "";
                    $actMessage = "";
                    $todayDate = date("Y-m-d");
                    $datetime1 = new DateTime();
                    $datetime2 = new DateTime($activity->activityStartDate);
                    $difference = $datetime1->diff($datetime2);
                    if ($activity->activity_type == "Call") {
                        $link = "tel: ".$activity->location;
                        $iconCls = "timeline-point-primary";
                        $actMessage = "Call at ".date("d M, Y h:i:s a",strtotime($activity->activityStartDate));
                    }
                    if ($activity->activity_type == "Whatsapp") {
                        $link = "https://wa.me/".$activity->location."?text=I'm%20interested%20in%20your%20car%20for%20sale";
                        $iconCls = "timeline-point-success";
                        $actMessage = "Whatspp chat at ". date("d M, Y h:i:s a",strtotime($activity->activityStartDate));
                    }
                    if ($activity->activity_type == "Email") {
                        $link = "mailto:".$activity->location;
                        $iconCls = "timeline-point-info";
                        $actMessage = "Email at ". date("d M, Y h:i:s a",strtotime($activity->activityStartDate));
                    }
                    if ($activity->activity_type == "Meeting") {
                        $link = $activity->location;
                        $iconCls = "timeline-point-warning";
                        $mettingArr = \App\Http\Helpers\CommonFunction::getMeetingType(); 
                       
                        $actMessage = "Meeting at ". date("d M, Y h:i:s a",strtotime($activity->activityStartDate));
                        if($activity->metting > 0){
                             $actMessage =  $mettingArr[$activity->metting]." at ". date("d M, Y h:i:s a",strtotime($activity->activityStartDate));
                        }
                    }
            ?>
              <li class="timeline-item timeline-item-transparent ps-4">
                <span class="timeline-point {{ $iconCls }}"></span>
                <div class="timeline-event">
                  <div class="timeline-header">
                    <h6 class="mb-0">{{ $activity->lead->vTitle??""}}</h6>
                    <small class="text-muted">{{ ($difference->d??"").' days ago' }}</small>
                  </div>
                  <p class="mb-2">{{ $actMessage }}</p>
                  <div class="d-flex flex-wrap">
                    <!--<div class="avatar me-2">-->
                    <!--  <img src="../../assets/img/avatars/3.png" alt="Avatar" class="rounded-circle" />-->
                    <!--</div>-->
                    <div class="ms-1">
                      <h6 class="mb-0">{{ $activity->lead->vFullname??""}}</h6>
                      <span><a  href="{{$link}}" target="_blank">{{$activity->location}}</a></span>
                    </div>
                  </div>
                </div>
              </li>
          <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
