@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-hover table-striped" id = "user_table">
        <thead>
        <tr>
            <td>Логин</td>
            <td>Email</td>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $k=>$user)
            <tr id ="{{$user->id}}" >
                <td class="name" > {{$user->name}} </td>
                <td class="email"> {{$user->email}} </td>
                <td><button type="button"  class="btn btn-primary edit_user" value="{{$user->id}}" data-toggle="modal" data-target="#edituser"  >
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

                                    {{--                                                    <!-- Контейнер, в котором можно создавать классы системы сеток -->--}}
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <input type="text" id= "log" value ="{{$user->name}}" class="form-control input-xl-3 login"
                                                   name="login" >
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" value ="{{$user->email}}" class="form-control input-xl-3"
                                                   name="email" >
                                            <input type="hidden" name="password">
                                            <input type="hidden" value="{{$user->id}}" name="id">

                                        </div>
                                    </div>
                                </div>


                                {{--                                            </div>--}}
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                    <button type="button" class="btn btn-primary save_edit_user">Сохранить</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>


                <td> <button  class="btn btn-primary del_user" value="{{$user->id}}" data-toggle="modal"    type="button" > Удалить</button> </td>

                </form>

            </tr>

        @endforeach
        </tbody>
    </table>
    <div> <button  class="btn btn-primary add_user" data-toggle="modal" data-target="#adduser" type="button">Добавить</button> </div>
</div>
@include('addUser')
@endsection
