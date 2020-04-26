jQuery(function ($) {
    $(document).ready(function () {
        $('#filter_form').submit(function( e ) {
            e.preventDefault();
            $(".table tr").remove();
            let data = $( this ).serialize();
            $.ajax({
                url: '/manager/getOrderList',
                method: 'post',
                data: data,
                success: function (response) {
                    $.each(response, function (index, value) {
                        let appendTable =  `<tr>
                            <td><a href="/manager/managementOrder/${value.id}">${value.title}</a></td>
                            <td>${value.order_user.name}</td>
                            <td>${value.created_at}</td>`;
                        if(value.closed_at != null){
                            appendTable += ` <td> Закрытая </td></tr>`;
                        } else if (value.working) {
                            appendTable += ` <td> Выполняется </td></tr>`;
                        } else if (value.viewed_at != null){
                            appendTable += ` <td> Просмотрена </td></tr>`;
                        } else {
                            appendTable += ` <td> Не просмотрена </td></tr>`;
                        }
                        $('.table tbody').append(appendTable)
                    });
                },
                error: function (response) {
                    $.each(response.responseJSON.errors,function (index, value) {
                        let messageError;
                        $.each(value , function (index,textError) {
                            messageError[index] = textError;
                        });
                    })
                }
            })
        });

    });
});
