@extends('admin.layouts.app')

@section('title', 'Pipeline Category - CRM')
@section('content')


<div class="container-fluid">
    <div class="row">
        <!-- Bordered Table -->
        <div class="card mt-4">
            <div class="card-header row">
                <div class="col-md-10">
                    <h5>Categories List</h5>
                </div>
                <div class="col-md-2 col-4">
                    <button type="button" id="add_category" class="btn btn-success text-white btn-md">
                        <i class="fa fa-plus a44 me-1" aria-hidden="true"></i> Category
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="table_id" class="table table-bordered dataTable">
                        <thead>
                            <tr>
                                <th><b>SR NO.</b></th>
                                <th><b>Category Name</b></th>
                                <th><b>Action</b></th>
                            </tr>
                        </thead>
                        <tbody id="category">
                            @foreach ($category as $key => $item)


                            <tr id="row_category_{{ $item->id }}">
                                <td>{{ $key+1 }}</td>
                                <td>
                                    {{ $item->category }}
                                </td>
                                <td><a href="" id="edit_category" data-id="{{ $item->id }}" class="fas fa-pencil-alt"></a> &nbsp;
                                    <a href="{{ route('destroy', ['id' => $item->id]) }}" id="delete_category" data-id="{{ $item->id }}" class="fas fa-trash"></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/ Bordered Table -->



        <!-- Add User Modal -->
        <div class="modal" id="add">
            <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="mb-4">
                            <h5 class="mb-2" id="modal_title"></h5>
                            <hr>
                        </div>


                        <div class="row g-3">
                            <form id="form_category">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Category Name</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                                <i class="fa fa-plus a44" aria-hidden="true"></i>
                                            </span>
                                            <input type="hidden" name="id" id="id">
                                            <input type="text" class="form-control" id="name_category" name="category" />

                                        </div>
                                        <span class="text-danger category_err"></span>
                                    </div>
                                    <hr class="mt-3">
                                    <div class="col-md-7"></div>
                                    <div class="col-md-5 col-12">
                                        <Button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</Button>
                                        <Button type="submit" class="btn btn-success" id="#save"> save</Button>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->

            @endsection
            @push('script')
            <script type="text/javascript">
                $(document).ready(function() {
                    $.ajaxSetup({
                        headers: {
                            'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
                        }
                    })
                    $('#table_id').DataTable({
                        "order": [
                            [0, "desc"]
                        ] // Change the index (0) to the appropriate column you want to order by
                    });
                });

                $("#add_category").on('click', function() {
                    $(".category_err").empty();
                    $("#form_category").trigger('reset');
                    $("#modal_title").html('Add Category');
                    $("#add").modal('show');
                    $("#id").val("");


                });

                $("body").on('click', '#edit_category', function(event) {
                    $(".category_err").empty();
                    event.preventDefault();
                    var id = $(this).data('id');
                    $.get('category/' + id + '/edit', function(res) {
                        $("#modal_title").html("Edit Category");
                        $("#id").val(res.id);
                        $("#name_category").val(res.category);
                        $("#add").modal('show');
                    });
                });


                //  save date

                $("form").on('submit', function(e) {
                        e.preventDefault();
                        $(".category_err").empty();
                        $.ajax({
                            url: "category/store",
                            data: $("#form_category").serialize(),
                            type: 'POST',
                            success: function(res) {
                                console.log(res);
                                if ($("#id").val() !== "") {
                                    // Edit mode - Update the row data
                                    var rowId = "#row_category_" + $("#id").val();
                                    $(rowId).find("td:eq(1)").text($("#name_category").val());
                                    $(rowId).find("td:eq(2)").html(
                                        `<a href="" id="edit_category" data-id="${$("#id").val()}" class="fas fa-pencil-alt"></a> &nbsp;<a href="{{ route('destroy', ['id' => $item->id]) }}" id="delete_category" data-id="${$("#id").val()}" class="fas fa-trash"></a>`
                                        );
                                    $("#form_category").trigger('reset');
                                    $("#add").modal('hide');
                                } else {
                                    // Add mode - Add a new row
                                    var newRow = [
                                        res.id,
                                        res.category,
                                        `<a href="" id="edit_category" data-id="${res.id}" class="fas fa-pencil-alt"></a> &nbsp;<a href="{{ route('destroy', ['id' => $item->id]) }}" id="delete_category" data-id="${res.id}" class="fas fa-trash"></a>`
                                    ];
                                    var table = $('#table_id').DataTable();
                                    table.row.add(newRow).draw(false);
                                    $("#form_category").trigger('reset');
                                    $("#add").modal('hide');
                                }
                            },
                            error: function(data) {
                                if (data.responseJSON) {
                                $(".category_err").empty();
                                $("#errMessage").removeClass("d-none");
                                console.log(data.responseJSON.errors);
                                $.each(data.responseJSON.errors, function(key, value) {
                                    var errMsg = "";
                                    $.each(value, function(k, v) {
                                        errMsg += "<h6 class='text-danger'>" + v + "</h6>";
                                    });
                                    $("." + key + "_err").html(errMsg);
                                });
                            }
                            }

                        });
                    });
            </script>
            @endpush