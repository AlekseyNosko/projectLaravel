jQuery(function ($) {
    $('.del_user').on('click', function () {
        let id = $(this).val();
        $.ajax({
            url: '/deluser/'+ id,
            type: 'get',
            headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: function () {
                $('#'+id).remove();
            },
            error: function () {

            },
        });
    })


})