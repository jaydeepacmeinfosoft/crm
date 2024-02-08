{{-- @extends('admin.layouts.app')
@section('title', 'Lead - CRM')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y"> --}}

<div class="card app-calendar-wrapper">
    <div class="row g-0">

        <!-- Calendar & Modal -->

        <!-- /Calendar & Modal -->

        <div class="modal fade" id="ManageActivity" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Schedule An Activity</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="row">
                        <div class="col app-calendar-content">
                            <div class="card shadow-none border-0">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div id="activityData">
                                                @include('admin.activity._form')
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <!-- FullCalendar -->
                                            <div id="activity_calendar" style="height:800px;"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="app-overlay"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

