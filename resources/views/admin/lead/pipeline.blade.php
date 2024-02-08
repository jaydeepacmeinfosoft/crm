@extends('admin.layouts.app')
@section('title', 'Pipeline')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            @foreach ($result as $key => $value)
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title m-0 me-2">
                            <h5 class="m-0 me-2">{{ $value["lead_name"] }}</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0" id="{{ $value["id"]."_lead"}}" data-type="{{ $value["id"]}}" >
                            @if (count( $value["leadData"]) > 0)
                                @foreach ($value["leadData"] as $ld)
                                    <li class="d-flex mb-2 pb-1 align-items-center" data-id="{{$ld->iid}}">
                                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="me-2">
                                                <h6 class="mb-0 text-success">{{ $ld->company_name }}</h6>
                                                <small
                                                    class="text-muted d-block fw-semibold">{{ $ld->vFullname }}</small>
                                                <!--<p class="text-muted mb-0">Rs.{{ $ld->dValue }} </p>-->
                                            </div>
                                        </div>
                                        <div class="badge bg-label-primary rounded p-1 mouse" data-id="{{ $ld->iid }}">
                                            <a href="{{ url('admins/lead/schedule/'.$ld->iid)}}"><i class="ti ti-clock ti-sm"></i></a>
                                        </div>
                                         <!--<div class="badge bg-label-primary rounded p-1 mouse showActivity" data-id="{{ $ld->iid }}">
                                            <i class="ti ti-clock ti-sm"></i>
                                        </div>-->
                                    </li>
                                    @if (!$loop->last)
                                        <div class="border-bottom border-bottom-dashed mt-1 mb-2"></div>
                                    @endif
                                @endforeach
                                @else
                                <li class="d-flex mb-2 pb-1 align-items-center">
                                    <div
                                        class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <h6 class="mb-0 text-secondary">No {{ $value["lead_name"] }} lead found</h6>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                    @if (count( $value["leadData"]) > 0)
                    <div class="card-footer">
                        <div class="d-grid gap-2 mx-auto">
                            <a href="{{ url('admins/lead/'.$value["id"])}}" class="btn btn-outline-primary waves-effect">View All</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @include("admin/lead/fullcalendar")
    {{-- @include("admin/lead/modals") --}}

@endsection
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script src="{{ url('admins/assets/vendor/libs/sortablejs/sortable.js') }}"></script>
<script src="{{ url('admins/assets/js/extended-ui-drag-and-drop.js') }}"></script>
@include('admin.lead.script')
    <script>
        $(document).on('click', '.showActivity', function() {
            var leadId = $(this).attr("data-id");
            $("#activityForm #lead_id").val(leadId);
            $("#ManageActivity").modal("show");
            setTimeout(() => {
            setTimeCalendarRender()
        }, 1000);
        });
    </script>
@endpush
