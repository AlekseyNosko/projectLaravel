@extends('layouts.app')

@section('content')
<div class="container">

                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <td>Логин</td>
                        <td>Email</td>
                    </tr>
                    </thead>
                    <tbody>
                   @foreach($users as $k=>$users)
                    <tr>
                        <td> {{$users->name}} </td>
                        <td> {{$users->email}} </td>
                        <td>
                            <button type="button"  class="btn btn-primary edit_user" value="{{$users->id}}" data-toggle="modal" data-target="#edituser"  >

                                  Редактировать
                                </button>

                    

                                <!-- Modal -->
                                <div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="edituserLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="edituserLabel">Редактирование пользователя</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                                <button type="button" class="btn btn-primary">Сохранить</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> </td>

                        <td> <button type="button" > Удалить</button> </td>
                        <td> <button type="button" > Добавить</button> </td>
                    </tr>
                   @endforeach
                    </tbody>
                </table>
</div>
{{--    <div class="row">--}}
{{--        <div class="col-6">--}}
{{--            <div class="row">--}}
{{--                <div class="col-2">--}}
{{--                    <button type="button" class="btn btn-success btn-block" > Удалить</button>--}}
{{--                </div>--}}
{{--                <div class="col-6">--}}
{{--                    <button type="button" class="btn btn-success btn-block" > Удалить</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-6">--}}
{{--            <button type="button" class="btn btn-success btn-block" > Удалить</button>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--<div class="container">--}}
    <div class="row">
        <div class="col-xl-1 offset-xl-6">
            <button type="button" class="btn btn-block btn-success btn-block" > Удалить</button>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-1 offset-xl-5">
            <button type="button" class="btn btn-block btn-warning" > Удалить2</button>
        </div>
        <div class="col-1">
            <button type="button" class="btn btn-block btn-dark" > Удалить3</button>
        </div>
        <div class="col-xl-1">
            <button type="button" class="btn btn-block btn-dark" > Удалить3</button>
        </div>

    </div>
    <div class="row">
        <div class="col-xl-1 offset-xl-4">
            <button type="button" class="btn btn-block btn-primary" > Удалить4</button>
        </div>
        <div class="col-xl-1 offset-xl-1">
            <button type="button" class="btn btn-block btn-primary" > Удалить4</button>
        </div>
        <div class="col-xl-1 offset-xl-1">
            <button type="button" class="btn  btn-block btn-danger" > Удалить5</button>
        </div>
    </div>
<div class="row">
    <div class="col-xl-1 offset-xl-3">
        <button type="button" class="btn btn-block btn-outline-dark" > Удалить5</button>
    </div>
    <div class="col-xl-1 offset-xl-2">
        <button type="button" class="btn btn-block btn-outline-dark" > Удалить5</button>
    </div>

    <div class="col-xl-1  offset-xl-2">
        <button type="button" class="btn btn-block btn-warning" > Удалить5</button>
    </div>
</div>
{{--</div>--}}


@endsection
