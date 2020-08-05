jQuery(function ($) {
    $('.save_edit_user').on('click', function () {
        var $data = {
            'login': $('input[name="login"]').val(),
            'email': $('input[name="email"]').val(),
            'id': $('input[name="id"]').val(),
        }

        $.ajax({
            url: '/savedituser',
            type: 'post',

            data: $data,
            headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

            success: function (response) {
                // console.log(response);
             $('#edituser').modal('hide');

                let appendTable =$('#'+response.id)
                console.log(appendTable);
                appendTable.find('td.name').text(response.name);
                appendTable.find('td.email').text(response.email);
               },
            error: function (url) {
                console.log("ERROR",url);
            },

        });

    })
})