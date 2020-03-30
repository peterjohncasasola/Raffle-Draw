jQuery(function($) {

    toastr.options = {
        "closeButton": true,
        "debug": true,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    var table = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/users",
        type: "POST",
        columns: [
            {data: 'id'},
            {data: 'username'},
            {data: 'name'},
            {data: 'created_at'},
            {data: 'action',orderable: false, searchable: false},
        ]
    })

    $("body").on('click','.activate', function() {
        let id = $(this).data('id');
       if (confirm("Activate the selected account?")) {
        $.ajax({
            type: "GET",
            url: "/activate-user/" + id,
            success: function(data) {
                toastr.success(`${data.name} has successfully activated`,"Success");
                table.draw();
            },
            error: function (error) {
                console.log('Error Data' + error)
            }
        })
       }
    })

    $("body").on('click','.deactivate', function() {
        let id = $(this).data('id');
        if (confirm("Deactivate the selected account?")) {
            $.ajax({
                type: "GET",
                url: "/deactivate-user/" + id,
                success: function(data) {
                    toastr.success(`${data.name} has successfully deactivated`,"Success");
                    table.draw();
                },
                error: function (error) {
                    console.log('Error Data' + error)
                }
            })
        }
    })

    $("body").on('click','.editUser', function() {
        let userId = $(this).data('id');
        $.ajax({
            type: "GET",
            url: "/users/" + userId,
            success: function(data) {

                $('#modalTitle').html('Edit User Details')
                $('#saveupdate').html('Update Member')
                $('#client_code').val(data.client_code);
                $('#client_name').val(data.client_name);
                $('#province').val(data.province);
                $('#contact_number').val(data.contact_number);
                $('#address').val(data.address);
                $('#id').val(data.id);
                $('#editModal').modal('show');
            },
            error: function (error) {
                console.log('Error Data' + error)
            }
        })
    })

    $("form").on("submit",function(event) {
        event.preventDefault();
        // $(this).html('Sending..');
        let data = {
            memberId : $("#memberId").val(),
            client_code : $("#client_code").val(),
            client_name : $("#client_name").val(),
            province : $("#province").val(),
            contact_no : $("#contact_no").val(),
            address : $("#address").val(),
        }
        $.ajax({
            url: "/members/",
            type: "POST",
            dataType: 'json',
            data: data,
            contentType: 'application/x-www-form-urlencoded',
            success: function (data) {

                $('#memberForm').trigger("reset");
                $('#editModal').modal('hide');
                toastr.success(`${data.client_name} info successfully updated`,"Edit Info");
                table.draw();

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('Error:', errorThrown);

                $('#saveBtn').html('Save Changes');
            }
        });
    })
});
