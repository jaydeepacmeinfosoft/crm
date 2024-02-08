@extends('admin.layouts.app')
@section('title', 'Subscription - CRM')

@section('content')
<div class="container-fluid">
        <div class="row">
            <!-- Bordered Table -->
            <div class="card mt-4">
                <div class="card-header row">
                    <div class="col-md-10 col-10">
                        <h5>Subscription list</h5>
                    </div>
                    <div class="col-md-2 col-2">
                          <a href="{{route('subscription.add')}}" class="btn btn-success text-white btn-md" id="">
                            <i class="fa fa-plus me-1" aria-hidden="true"></i> Add
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered" id="Subscriptiontable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Duration</th>
                                    <th>Time Period</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                   <th>Action</th>
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
   
@endsection
@push('script')

<script>
    $(document).ready(function($) {
        $('#Subscriptiontable').DataTable({
            ajax: "{{ route('subscription.list') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'duration',
                    name: 'duration'
                },
                 {
                    data: 'period',
                    name: 'period'
                },
                {
                    data: 'price',
                    name: 'price'
                },

                {
                   
                    data: 'discount',
                    name: 'discount'
                },
              

                
                // Add other columns as needed
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]

        });
    });
</script>
@endpush