@extends('layouts.managerPanel')

@section('content')
    <div class="content">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <hr>
        <div class="row title">
            <div class="col-12">
                <h5>заявка №{{$order->id}}</h5>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="offset-1 col-1">
                <label for="title">Тема:</label>
            </div>
            <div class="col-9">
                {{$order->title}}
            </div>
        </div>
        <div class="row">
            <div class="offset-1 col-1">
                <label for="text">Сообщение:</label>
            </div>
            <div class="col-9">
                <textarea name="text_order" id="text_order" cols="80" rows="8" readonly>{{$order->text}}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="offset-1 col-1">
                <label for="file">Файл:</label>
            </div>
            <div class="col-9">
                {{$order->file}}
            </div>
        </div>
            <div class="row">
                <div class="offset-1 col-1">
                    <label>Статус:</label>
                </div>
                <div class="col-9">
                    @if ($order->closed_at != null) Закрытая @elseif ($order->working) Выполняется @elseif ($order->viewed_at != null) Просмотрена @else Не просмотрена @endif
                </div>
            </div>
            <div class="row">
                <div class="offset-1 col-1">
                    <label>Дата заявки:</label>
                </div>
                <div class="col-2">
                    {{$order->created_at}}
                </div>
                <div class="offset-1 col-1">
                    <label>Пользователь:</label>
                </div>
                <div class="col-3">
                    {{ $order->orderUser->name }}
                </div>
            </div>
        <hr>
        <div class="row">
            <div class="offset-1 col-1">
                <label>Действия:</label>
            </div>
            @can('add_to_worked')
                <div class=" col-2">
                    <a href="{{route('addToWorkOrder',$order->id)}}" class="btn btn-success @if($order->closed_at || $order->working) disabled @endif">Принять в работу</a>
                </div>
            @endcan
            @can('closed_order')
                <div class=" col-2">
                    <a href="{{route('closedOrder',$order->id)}}" class="btn btn-success @if($order->closed_at) disabled @endif">Закрыть заявку</a>
                </div>
            @endcan
        </div>
        <hr>
            <div class="row title">
                <div class="col-12">
                    <h5>Сообщения</h5>
                </div>
            </div>
            @foreach($orderMessages as $message)
                <div class="row">
                    <div class="offset-1 col-10 alert alert-primary">
                        <div class="row">
                            <div class="col-12">
                                <label for="text">Сообщение от {{$message->messageUser->name}} | дата: {{$message->created_at}}</label>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <textarea name="text_mess" id="text_mess" cols="100" rows="2" readonly>{{$message->text}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <hr>
            <form method="POST" action="{{route('sendMessage')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}">
                <input type="hidden" name="order_id" id="order_id" value="{{$order->id}}">
            <div class="row">
                    <div class="offset-1 col-2">Отправить сообщение:</div>
                    <div class="col-6"><textarea name="text" id="text" cols="100" rows="2"></textarea></div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </div>
            </div>
            </form>
            <hr>
    </div>
@endsection
