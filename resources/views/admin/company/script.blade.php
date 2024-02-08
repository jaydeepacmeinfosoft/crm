<script>
    $(document).ready(function(){
    $.ajaxSetup(
        {
            headers:{
                'x-csrf-token':$('meta[name="csrf-token"]').attr('content')
            }
        }
    )
});
//show add modal
$("#modal_company").on("click", function(event) {
    event.preventDefault(); // Prevent the default link behavior
    $("#modal_form").trigger("reset");
    $("#modal_title").html("Add campany");
    $("#company_model").modal("show");
});
function clearFormData(){
      $.ajax({
            url: "{{ url('/admins/company/clearFormData')}}",
            type: "post",
            dataType: 'json',
            success: function (response) {
                $("#modal_title").html("Add campany");
                $("#companyData").html(response.data);
            },
            error: function (xhr) {
                console.log("An error occurred while deleting the company");
            },
        });
}
$('#company_model').on('hidden.bs.modal', function (e) {
   clearFormData();
})

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
//edit code
$(document).on("click", "#editmodal", function(event) {
    event.preventDefault();
    var companyId = $(this).data("id");

    // Fetch company data using AJAX
    $.ajax({
        url: "{{url('/admins/company')}}"+'/'+companyId,
        type: "GET",
        success: function(response) {
            // Update modal form fields with company data
            $("#modal_title").html("Edit Company");
            $("#modal_form").attr("data-action", companyId); // Set the form action for editing
            $("#companyData").html(response.data);
            // Populate the form fields with the data fetched from the server
            // $("#id").val(response.id);
            // $("#company_name").val(response.company_name);
            // $("#email").val(response.email);
            // $("#password").val(response.password);
            // $("#password_confirmation").val(response.password);
            // $("#number").val(response.number);
            // $("#address").val(response.address);
            // $("#logo").val(response.logo);
            $("#company_model").modal("show");
        },
        error: function(xhr) {
            if (data.responseJSON) {
                $(".errMsg").empty();
                $("#errMessage").removeClass("d-none");
                console.log(data.responseJSON.errors);
                $.each(data.responseJSON.errors, function(key, value) {
                    var errMsg = "";
                    $.each(value, function(k, v) {
                        errMsg += "<h6 class='text-danger'>" + v + "</h6>";
                    });
                    $("#" + key + "_err").html(errMsg);
                });
            }
        },
    });
});

//user modal
$(document).on("click", "#actionmodal", function(event) {
    event.preventDefault();
    var companyId = $(this).data("id");

    // Fetch company data using AJAX
    $.ajax({
        url: "{{url('/admins/company_user')}}"+'/'+companyId,
        type: "GET",
        success: function(response) {
            // Update modal form fields with company data
        //  $("#modal_title").html("Edit Company");
             $("#form_modal").attr("data-action", companyId); // Set the form action for editing
            $("#modal_title").html(response.company.company_name + " Users");
            $("#user_count").html(response.usercount + " Members");
            $("#user_list").empty();

// Populate user details in the modal
$.each(response.user, function(index, user) {
    var userHtml = '<li class="d-flex flex-wrap mb-3">';
    userHtml += '<div class="avatar me-3">';
    userHtml += '<img src="{{ url('public/userlogos') }}/'+ user.logo + '" alt="avatar" class="rounded-circle" />';
    userHtml += '</div>';
    userHtml += '<div class="d-flex justify-content-between flex-grow-1">';
    userHtml += '<div class="me-2">';
    userHtml += '<p class="mb-0">' + user.name + '</p>';
    userHtml += '<p class="mb-0 text-muted">' + user.email + '</p>';
    userHtml += '</div>';
    userHtml += '<div class="me-2 text-center">';
    userHtml += '<p class="mb-0">Password</p>';
    userHtml += '<p class="mb-0 text-muted">' + user.password + '</p>';
    userHtml += '</div>';
    userHtml += '<div class="me-2 text-right">';
    userHtml += '<p class="mb-0">Roll</p>';
    var userTypeString = '';
    if (user.user_roll == 1) {
        userTypeString = 'Account';
    } else if (user.user_roll == 2) {
        userTypeString = 'Marketing';
    } else if (user.user_roll == 3) {
        userTypeString = 'Sales';
    }
    else
    {
        userTypeString = 'unkonwn';
    }
    userHtml += '<p class="mb-0 text-muted">' +userTypeString + '</p>';
    userHtml += '</div>';
    userHtml += '</div>';
    userHtml += '<div class="dropdown">';
    userHtml += '<button type="button" class="btn dropdown-toggle p-2" data-bs-toggle="dropdown" aria-expanded="false">';
    userHtml += '<span class="text-muted fw-normal me-2 d-none d-sm-inline-block">Can Edit</span>';
    userHtml += '</button>';
    userHtml += '<ul class="dropdown-menu dropdown-menu-end" style="">';
    userHtml += '<li><a class="dropdown-item edit" href="javascript:void(0);">Edit</a></li>';
    userHtml += '<li><a class="dropdown-item  delete" href="javascript:void(0);">Delete</a></li>';
    userHtml += '</ul>';
    userHtml += '</div>';
    userHtml += '</li>';
    
    // Append user details to the user list
    $("#user_list").append(userHtml);

    $("#user_list li:last-child .dropdown-item.delete").on("click", function(event) {
        event.preventDefault();
                        var userId = user.id;
                        var confirmDelete = confirm("Are you sure you want to delete this user?");

                        if (confirmDelete) {
                            // Make AJAX request to delete the user
                            $.ajax({
                                url: "{{ route('user.destroy', ['id' => ':id']) }}".replace(':id', userId),
                                 type: "DELETE",
                                success: function(deleteResponse) {
                                    // Handle success (remove the deleted user from the UI)
                                    $("#user_list li[data-user-id='" + userId + "']").remove();
                                    $("#cuserview").modal("hide");
 
                                toastr.success('User successfully deleted');  
                                window.location.reload();
                               },
                                error: function(deleteError) {
                                    // Handle error (show an error message)
                                    toastr.error();('Error deleting user'); 
                                    console.error(deleteError);
                                }
                        });
                    }
                });
            });
           

            $("#cuserview").modal("show");
            
        },
        error: function(xhr) {
            if (data.responseJSON) {
                $(".errMsg").empty();
                $("#errMessage").removeClass("d-none");
                console.log(data.responseJSON.errors);
                $.each(data.responseJSON.errors, function(key, value) {
                    var errMsg = "";
                    $.each(value, function(k, v) {
                        errMsg += "<h6 class='text-danger'>" + v + "</h6>";
                    });
                    $("#" + key + "_err").html(errMsg);
                });
            }
        },
    });
    
});
 
$(document).on("click", ".show_model", function(event) {
    event.preventDefault();
    $("#cuserview").modal("hide");  // Hide the modal
});
//data in table
var table = "";
    $(document).ready(function() {
        // Initialize DataTables
         table = $('#companyTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url:"{{route('company')}}", // Replace with the actual URL to fetch the company data from your Laravel application
                type: 'GET',
            },
            columns: [
                {
                    data: 'DT_RowIndex',
                    searchable: false,
                    orderable: false,
                    width: 10
                },
                { data: 'company_name',searchable: true },
                 { data: 'email',searchable: true },
               
                { data: 'address',searchable: true },
                { data: 'password',searchable: true },
                // {
                //     data: 'logo', // This should be the attribute name you used in the Company model's accessor
                //         render: function(data) {
                //             if(data){
                //                 return '<div class="thumbnail-container">' +
                //          `<img src="{{ url('public/logos')}}/${data}" alt="Company Logo" class="img-thumbnail" width="30" height="30">` +
                //          '</div>';
                //             } else {
                //                 return '<div class="thumbnail-container">' +
                //          `<img src="{{ url('public/logos/no-image.jpg')}}" alt="Company Logo" class="img-thumbnail" width="30" height="30">` +
                //          '</div>';
                //             }
                         

                //     },
                //     searchable: false
                // },
                // { data: 'number',searchable: true },
                { 
                    data: null, 
                    render: function(data) {
                        return data.users.length;
                    } 
                },
                // { data: 'action' },
                {
                "data": null,
                "searchable": false,
                "orderable": false,
                "width": "6%",
                render: function(o) {
                    var element =
                        `<a href="" id="editmodal"  data-id="${o.id}"><i class="fas fa-pencil-alt"></i></a>&nbsp;<a onClick="deleteCompany(${o.id})"><i  class="fas fa-trash ml-2" ></i></a>`;
                    return element;
                 } }, 
                {
                "data": null,
                "searchable": false,
                "orderable": false,
                "width": "6%",
                render: function(o) {
                    var element =
                        `<button
                          type="button"
                          class="btn btn-sm btn-primary"
                          data-id="${o.id}"
                          id="actionmodal" 
                          >
                          View 
                        </button>
                        `;
                    return element;
                }
            },
            ]
        });
        
        
 deleteCompany = (id) => {
            var url = '{{ route('company.destroy', ':id') }}';
            url = url.replace(':id', id);
            deleteRecordByAjax(url, 'Company', table);
            console.log("SDfsdfs")
             $('#companyTable').DataTable().ajax.reload();
 }
    });

</script>
