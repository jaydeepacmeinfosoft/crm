@extends('admin.layouts.app')
@section('title',"Activity - CRM")
@push("styles")
 <link rel="stylesheet" href="{{ url('admins/assets/vendor/libs/flatpickr/flatpickr.css') }}">
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
                                    <th><b>Location Url</b></th>
                                    <th><b>Schedule</b></th>
                                    <th><b>time</b></th>
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
    @include("admin/lead/modals")
    @endsection
    @push("script")
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
            columns: [ {
                    data: 'DT_RowIndex',
                    searchable: false,
                    orderable: false,
                    width: 10
                },
                {
                    "data": null,
                    render: function(o) {
                        console.log(o.lead);
                       return o.lead.vTitle+" ("+o.lead.vleadType+")";
                    }
                },
                {
                    data: 'location',
                    name: 'location'
                },
                {
                    data: 'schedule',
                    name: 'schedule'
                },
                {
                    data: 'time',
                    name: 'time'
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
                        var element = `<a type="button"  title="Edit"  class="editActivity" data-id="${o.id}"><i class='fa fa-edit'></i></a>&nbsp;<a href="#" type="button"  title="Delete" onclick="deleteactivity(${o.id})"><i class='fa-solid fa-trash-can'></i></a>`;
                        return element;
                    }
                },
            ]
        });

        $(document).on('click', '.editActivity', function() {
            console.log("id: ",$(this).attr("data-id"))      ;
            var url = '{{ route("activity.edit", ':id') }}';
            url = url.replace(':id', $(this).attr("data-id"));

            $.ajax({
                url:url,
                method:"GET",
                dataType:"json",
                success:function(res)
                {
                    $("#activityData").html(res.data);
                    $("#ManageActivity").modal("show");
                }
            });
        });

        deleteactivity = (id) => {
            var url = '{{ route("activity.destroy", ':id') }}';
            url = url.replace(':id', id);
            deleteRecordByAjax(url, 'Activity', oTable);
        }


    </script>
    @endpush
