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

    var table = $('#members-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "/members",
        type: "POST",
        columns: [
            {data: 'memberId'},
            {data: 'client_code'},
            {data: 'client_name'},
            // {data: 'membership_date'},
            {data: 'province'},
            {data: 'action',orderable: false, searchable: false},
        ]
    })



    $("body").on('click','.registerMember', function() {
        let memberId = $(this).data('id');

        if (confirm("Register the selected member?")) {
            $.ajax({
                type: "GET",
                url: "/register-member/" + memberId,
                success: function(data) {
                    toastr.success(`${data.client_name} has successfully registered`,"Success");
                    table.draw();
                },
                error: function (error) {
                    console.log('Error Data' + error)
                }
            })
        }
    })

    var registeredTable = $('#participant-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "/participant",
        type: "POST",
        columns: [
            {data: 'memberId'},
            {data: 'client_code'},
            {data: 'client_name'},
            {data: 'membership_date'},
            {data: 'province'},
            {data: 'contact_no'},
            {data: 'address'},
            {data: 'action',orderable: false, searchable: false},
        ]
    });

    var registeredTable = $('#winners-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "/winners-list",
        type: "POST",
        columns: [
            {data: 'memberId'},
            {data: 'member_name'},
            {data: 'province'},
            {data: 'prize'},
        ]
    });

    // setInterval(() => {
    //     registeredTable.draw();
    // }, 1000);

    $("body").on('click','.unregisterMember', function() {
        let memberId = $(this).data('id');
        $.ajax({
            type: "GET",
            url: "/unregister-member/" + memberId,
            success: function(response) {
                registeredTable.draw();
            },
            error: function (error) {
                console.log('Error Data' + error)
            }
        })
    })

    $("body").on('click','.editMember', function() {
        let memberId = $(this).data('id');
        $.ajax({
            type: "GET",
            url: "/members/" + memberId,
            success: function(data) {

                $('#modalTitle').html('Edit Member Details')
                $('#saveupdate').html('Update Member')
                $('#client_code').val(data.client_code);
                $('#client_name').val(data.client_name);
                $('#province').val(data.province);
                $('#contact_number').val(data.contact_number);
                $('#address').val(data.address);
                $('#memberId').val(data.memberId);
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
            success: function (response) {

                $('#memberForm').trigger("reset");
                $('#editModal').modal('hide');
                toastr.success(`${response.client_name} info successfully updated`,"Edit Info");
                table.draw();

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('Error:', errorThrown);

                $('#saveBtn').html('Save Changes');
            }
        });
    })
});
