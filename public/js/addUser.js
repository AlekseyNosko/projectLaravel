jQuery(function ($) {
    $('.save_adduser').on('click', function () {
        var $data = {
            'login': $('input[name="addlogin"]').val(),
            'email': $('input[name="addemail"]').val(),
            'password': $('input[name="addpassword"]').val(),
        }
        $.ajax({
            url: '/adduser',
            type: 'post',
            data: $data,
            headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: function (response) {
                $('#adduser').modal('hide');
                let appendTable =  `<tr>
                        <td>${response.name}</td>
                        <td>${response.email}</td>
                        <td><button type="button"  class="btn btn-primary edit_user" value="${response.id}" data-toggle="modal" data-target="#edituser"  >
                                  Редактировать
                                </button></td>
                            <td> <button  class="btn btn-primary del_user" value="${response.id}}" data-toggle="modal"    type="button" > Удалить</button> </td>
                        </tr>`;
                $('#user_table tbody').append(appendTable)
            },
            error: function (url) {
                console.log("ERROR",url);
            },
        });
    })
})
