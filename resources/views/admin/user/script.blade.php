<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $("#show_model").on("click", function(event) {
            event.preventDefault(); // Prevent the default link behavior
            $('#id').val("");
            $(".errMsg").empty();
            $("#passwordDiv").removeClass("d-none");
            $("#userManageForm").trigger("reset");
            $("#user_modal_title").html("Add user");
            $("#userManageModal").modal("show");
        });
        // $('#user_form').submit(function(e) {
        //     $(".errMsg").html("")
        //     e.preventDefault();
        //     var formData = $(this).serializeArray();
        //     console.log("formData: ", formData);
        //     $.ajax({
        //         url: '{{ route('user.store') }}',
        //         method: 'POST',
        //         data: formData,
        //         dataType: 'json',
        //         success: function(response) {
        //             if (response.success) {
        //                 toastr.success('Records added successfully.');
        //                 $('#user_form input[type="text"]').val('');
        //                 $('#user_form input[type="email"]').val('');
        //                 $('#user_form input[type="password"]').val('');
        //             } else {
        //                 toastr.error('An error occurred. Please try again.');
        //             }
        //         },
        //         error: function(data) {
        //             console.log(data);
        //             console.log(data.responseJSON.key);
        //             var datakk = data.responseJSON.key;
        //             if (data.responseJSON) {
        //                 $(".errMsg").empty();
        //                 $("#errMessage").removeClass("d-none");
        //                 console.log(data.responseJSON.errors);
        //                 $.each(data.responseJSON.errors, function(key, value) {
        //                     var errMsg = "";
        //                     $.each(value, function(k, v) {
        //                         errMsg += "<h6 class='text-danger'>" + v +
        //                             "</h6>";
        //                     });

        //                     $("." + key + "_err").each(function(kk, vv) {
        //                         console.log(kk, " ", datakk);
        //                         if (kk == datakk) {
        //                             $(vv).html(errMsg);
        //                             console.log(kk, vv);
        //                         }

        //                     });
        //                     // $("#" + key + "_err").html(errMsg);
        //                 });
        //             }
        //         }

        //     });


        // });


    });

    //show data in table
    oTable = $('#usertable').DataTable({
        processing: true,
        serverSide: true,
        // responsive: true,
        searching: true,
        ordering: true,
        paging: true,
        //pagingType: "full_numbers",
        ajax: {
            url: "{{ route('user.viewuser') }}",
            type: 'GET',
            data: function(request) {
                request._token = '{{ csrf_token() }}';
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
            //  {
            //     "data": null,
            //     render: function(o) {
            //         return o.companies?o.companies.company_name:"";
            //     }
            // },
            {
                data: 'name',
            },
            {
                data: 'email',
            },
            {
                data: 'password',
            },
            {
                "data": null,
                "searchable": false,
                "orderable": false,
                "width": "3%",
                render: function(o) {
                    var element =
                        `<a href="" type="button" id="editdata" title="Edit" class="edituser" data-id="${o.id}"><i class='fa fa-pencil'></i></a>&nbsp;<a id="deleteuser11" title="Delete" onclick="deleteUser(${o.id})"><i class='fa fa-trash'></i></a>`;
                    return element;
                }
            },
        ],
    });

    deleteUser = (id) => {
            var url = '{{ route('user.destroy',' :id') }}';
            url = url.replace(':id', id);
            deleteRecordByAjax(url, 'User', oTable);
        }

    //edit code
      $('#usertable').on('click', '#editdata', function(e) {
        e.preventDefault();
        var userId = $(this).data('id');

        // Use DataTables API to get the data of the selected row
        var rowData = oTable.row($(this).closest('tr')).data();
        console.log(rowData);
        // Populate the modal form with the fetched data
        $('#id').val(rowData.id);
        $('#name').val(rowData.name);
        $('#company_id').val(rowData.company_id);
        $('#email').val(rowData.email);
        $('#password').val(rowData.password);
        $('#user_roll').val(rowData.user_roll);
        var logoUrl = rowData.logo ? "{{ url('public/userlogos') }}/" + rowData.logo : "{{ url('public/logos/no-image.jpg') }}";
        $('#imgPreview').attr('src', logoUrl);
        // $("#passwordDiv").addClass("d-none");
        // $('#password').val(rowData.password);
        // Show the modal
        $('#userManageModal').modal('show');
    });
    
      $('input[name=logo]').change(function(){
        const file = this.files[0];
        console.log("lofogo: ",file);
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            console.log(event.target.result);
            $('#imgPreview').attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
    });

</script>
