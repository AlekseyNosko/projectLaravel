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
