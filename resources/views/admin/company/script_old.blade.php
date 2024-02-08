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
$("#show_model").on("click", function(event) {
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
                { data: 'number',searchable: true },
                { data: 'address',searchable: true },
                {
                    data: 'logo', // This should be the attribute name you used in the Company model's accessor
                        render: function(data) {
                            if(data){
                                return '<div class="thumbnail-container">' +
                         `<img src="{{ url('public/logos')}}/${data}" alt="Company Logo" class="img-thumbnail" width="30" height="30">` +
                         '</div>';
                            } else {
                                return '<div class="thumbnail-container">' +
                         `<img src="{{ url('public/logos/no-image.jpg')}}" alt="Company Logo" class="img-thumbnail" width="30" height="30">` +
                         '</div>';
                            }
                         

                    },
                    searchable: false
                },
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
                "width": "3%",
                render: function(o) {
                    var element =
                        `<a href="" id="editmodal"  data-id="${o.id}"><i class="fas fa-pencil-alt"></i></a>&nbsp;<a onClick="deleteCompany(${o.id})"><i  class="fas fa-trash ml-2" ></i></a>`;
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
