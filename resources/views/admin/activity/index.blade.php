@extends('admin.layouts.app')
@section('title', 'Activity - CRM')
@push('styles')
    <link rel="stylesheet" href="{{ url('admins/assets/vendor/libs/flatpickr/flatpickr.css') }}">
    <style>
        .fc-event-main {
            color: white;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Bordered Table -->
            <div class="card mt-4">
                <div class="card-header row">
                    <div class="col-md-8">
                        <h5>Activity list</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered" id="activityList">
                                <thead>
                                    <tr>
                                        <th><b>SNO.</b></th>
                                        <th><b>Lead Title</b></th>
                                        <th><b>Activity</b></th>
                                        <th><b>Link</b></th>
                                        <th><b>Activity Start</b></th>
                                        <th><b>Activity End</b></th>
                                        <th><b>Metting</b></th>
                                        <th><b>Action</b></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin/lead/fullcalendar')
@endsection
@push('script')
    <script src="{{ url('admins/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script>
        oTable = $('#activityList').DataTable({
            processing: true,
            serverSide: true,
            // responsive: true,
            searching: true,
            ordering: true,
            paging: true,
            pagingType: "full_numbers",
            ajax: "{{ route('activity.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    orderable: false,
                    width: 10
                },
                {
                    "data": null,
                    render: function(o) {
                        return o.vTitle + " (" + o.vleadType + ")";
                    }
                },
                {
                    data: 'activity_type',
                    name: 'activity_type'
                },
                {
                    data: null,
                    name: null,
                    render: function(o) {
                        var link="";
                        if (o.activity_type == "Call") {
                            link = "tel:" + o.location;
                        }
                        if (o.activity_type == "Whatsapp") {
                            link =
                                `https://wa.me/${o.location}?text=I'm%20interested%20in%20your%20car%20for%20sale`
                        }
                        if (o.activity_type == "Email") {
                            link = "mailto:" + o.location;
                        }
                        if (o.activity_type == "Meeting") {
                            link = o.location;
                        }
                        var element =
                            `<a  href="${link}" target="_blank">${o.location}</a>`;
                        return element;
                    }
                },
                {
                    data: 'activityStartDate',
                    name: 'activityStartDate'
                },
                {
                    data: 'activityEndDate',
                    name: 'activityEndDate'
                },
                {
                    data: 'meeting_name',
                    name: 'meeting_name'
                },
                {
                    "data": null,
                    "searchable": false,
                    "orderable": false,
                    "width": "3%",
                    render: function(o) {
                        var element =
                            `<a type="button"  title="Edit"  class="editActivity" data-id="${o.id}"><i class='fa fa-edit'></i></a>&nbsp;<a href="#" type="button"  title="Delete" onclick="deleteactivity(${o.id})"><i class='fa-solid fa-trash-can'></i></a>`;
                        return element;
                    }
                },
            ]
        });

        $(document).on('click', '.editActivity', function() {
            console.log("id: ", $(this).attr("data-id"));
            var url = '{{ route('activity.edit', ':id') }}';
            url = url.replace(':id', $(this).attr("data-id"));

            $.ajax({
                url: url,
                method: "GET",
                dataType: "json",
                success: function(res) {
                    $("#activityData").html(res.data);
                    $("#ManageActivity").modal("show");
                    start = $("#activityStartDate").val();
                    end = $("#activityEndDate").val();
                    setTimeCalendarRender();
                    loadFlatPicker(start, end);
                    setTimeout(() => {
                        loadCalendar();
                        setTimeCalendarRender();
                    }, 1000);
                }
            });
        });

        deleteactivity = (id) => {
            var url = '{{ route('activity.destroy', ':id') }}';
            url = url.replace(':id', id);
            deleteRecordByAjax(url, 'Activity', oTable);
        }
    </script>
@endpush
