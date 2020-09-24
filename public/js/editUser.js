jQuery(function ($) {
    $('.edit_user').on('click', function () {
        $.ajax({
            url: '/edituser/'+ $(this).val(),
            type: 'get',
            success: function (response) {
                $('.edit_user').val();
            },
            error: function (error) {

            },
        });
    })
})


