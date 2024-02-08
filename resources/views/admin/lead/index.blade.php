@extends('admin.layouts.app')
@section('title', 'Lead - CRM')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Bordered Table -->
            <div class="card mt-4">
                <div class="card-header row">
                    <div class="col-md-11 col-12">
                        <h5>Lead list @if($type > 0) {{"(".$leadTypeName->category.")"}} @endif</h5>
                    </div>
{{--
                    <div class="col-md-4 col-6 pl-0 ms-0 d-flex">
                        <label class="w-25 mt-2 me-1">Lead Status:</label>
                        <select class="form-control w-75" id="leadType">
                            <option value="" selected>------Select Lead------</option>
                            @foreach ($leadTypeArr as $key => $leadT)
                                <option value="{{ $leadT->id }}">{{ $leadT->category }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="col-md-4 col-6">
                        <a href="" class="btn btn-success text-white btn-md" data-bs-toggle="modal"
                            data-bs-target="#ManageLead">
                            <i class="fa fa-plus a44" aria-hidden="true"></i> Lead
                        </a>
                        <a href="" class="btn btn-success text-white btn-md" data-bs-toggle="modal"
                        data-bs-target="#BulkLead">
                        <i class="fa fa-plus a44" aria-hidden="true"></i>Bulk Lead
                    </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered" id="leadReportList">
                            <thead>
                                <tr>
                                    <th><b>SNO.</b></th>
                                     <th><b>Company</b></th>
                                    <!--<th><b>Title</b></th>-->
                                    <!--<th><b>Value</b></th>-->
                                    <th><b>Pipeline</b></th>
                                    <th><b>Owner</b></th>
                                    {{-- <th><b>Status</b></th> --}}
                                    <th><b>Lead created</b></th>
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
    @include('admin/lead/modals')
@endsection
@push('script')
    <script>
    $(function() {
        $.ajaxSetup(
                {
                    headers:{
                        'x-csrf-token':$('meta[name="csrf-token"]').attr('content')
                    }
                }
            )
        
        var leadType =  "{{ $type??"" }}";
        $("#leadType").val(leadType);
        oTable = $('#leadReportList').DataTable({
            processing: true,
            serverSide: true,
            // responsive: true,
            searching: true,
            ordering: true,
            paging: true,
            pagingType: "full_numbers",
            ajax: {
                url: "{{ route('lead.lead_report_datatable') }}",
                type: 'POST',
                data: function(request) {
                    request._token = '{{ csrf_token() }}';
                    request.leadType = leadType
                    // request.yearMonthValue = dateId;
                    // request.empId = empId;
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    orderable: false,
                    width: 10
                },
                // {
                //     "data": null,
                //     render: function(o) {
                //         return o.companies?o.companies.company_name:"";
                //     }
                // },
                 {
                    data: 'company_name',
                },
                // {
                //     data: 'vTitle',
                // },
                // {
                //     data: 'dValue',
                // },
                {
                    data: null,
                    render: function(o) {
                        return o.pipelinectegory?o.pipelinectegory.category:"";
                    }
                },
                {
                    data: 'vFullname',
                },
                // {
                //     data: 'vleadType',
                // },
                {
                    data: 'formated_created_at',
                },
                {
                    "data": null,
                    "searchable": false,
                    "orderable": false,
                    "width": "3%",
                    render: function(o) {
                        var element =
                            `<a type="button"  title="Edit" class="editLead" data-id="${o.iid}"><i class='fa fa-edit'></i></a>&nbsp;<a href="#" type="button"  title="Delete" onclick="deleteLead(${o.iid})"><i class='fa-solid fa-trash-can'></i></a>`;
                        return element;
                    }
                },
            ],
        });
        $(document).on('click', '#leadType', function() {
            leadType = $(this).val();
            oTable.draw();
        });
        

        $(document).on('click', '.editLead', function() {
            var url = '{{ route('lead.edit', ':id') }}';
            url = url.replace(':id', $(this).attr("data-id"));
            $.ajax({
                url: url,
                method: "GET",
                dataType: "json",
                success: function(res) {
                    console.log()
                    $("#manageLeadTitle").text("Edit Lead");
                    $("#formData").html(res.data);
                    $("#ManageLead").modal("show");

                }
            });
        });

        deleteLead = (id) => {
            var url = '{{ route('lead.destroy', ':id') }}';
            url = url.replace(':id', id);
            deleteRecordByAjax(url, 'Lead', oTable);
        }
    });
    </script>
@endpush
