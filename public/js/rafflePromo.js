jQuery(function($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    var table = $('#raffle-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/raffle-promo",
        type: "POST",
        columns: [
            {data: 'id'},
            {data: 'prize'},
            {data: 'winners_count'},
            {data: 'claimed_count'},
            {data: 'remaining'},
            {data: 'action',orderable: false, searchable: false},
        ]
    })

    var rafflePrizeTable = $('#raffle-prize-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/raffle-prize-list",
        type: "post",
        columns: [
            {data: 'id'},
            {data: 'prize'},
            {data: 'description'},
            {data: 'winners_count'},
            {data: 'claimed_count'},
            {data: 'remaining'},
            {data: 'action',orderable: false, searchable: false},

        ]
    })

    $("body").on('click','.registerMember', function() {
        let memberId = $(this).data('id');
        $.ajax({
            type: "GET",
            url: "/register-member/" + memberId,
            success: function(response) {
                table.draw();
            },
            error: function (error) {
                console.log('Error Data' + error)
            }
        })
    })


    $("body").on('click','.edit', function() {
        let memberId = $(this).data('id');

        alert(memberId)
        $.ajax({
            type: "GET",
            url: "/raffle-settings/" + memberId,
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

    $("body").on('click','.set', function() {
        let id = $(this).data('id');


        $.ajax({
            type: "GET",
            url: "/setAsActive/" + id,
            success: function(data) {
                toastr.success(`Success`,"Success");
                table.draw();

            },
            error: function (error) {
                console.log('Error Data' + error)
            }
        })
    })

    $("body").on('click','.raffle-settings', function() {
        let raffleId = $(this).data('id');
        $.ajax({
            type: "GET",
            url: "/raffle-setting/" + raffleId,
            success: function(data) {

                $('#saveupdate').html('Save Changes')
                $('#roulette_one').val(data.roulette_one);
                $('#roulette_two').val(data.roulette_two);
                $('#roulette_three').val(data.roulette_three);
                $('#roulette_four').val(data.roulette_four);
                $('#prize_id').val(raffleId);
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
            prize_id : $("#prize_id").val(),
            roulette_one : $("#roulette_one").val(),
            roulette_two : $("#roulette_two").val(),
            roulette_three : $("#roulette_three").val(),
            roulette_four : $("#roulette_four").val(),
        }

        $.ajax({
            url: "/raffle-setting",
            type: "POST",
            dataType: 'json',
            data: data,
            contentType: 'application/x-www-form-urlencoded',
            success: function (data) {

                $('#raffleSetting').trigger("reset");
                $('#editModal').modal('hide');
                toastr.success(`successfully saved`,"Success");
                table.draw();

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('Error:', errorThrown);

                $('#saveBtn').html('Save Changes');
            }
        });
    })
});
