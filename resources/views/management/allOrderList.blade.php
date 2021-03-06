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
                <h5>Список заявок</h5>
            </div>
        </div>
            <hr>
            <form id="filter_form" method="POST" action="{{route('orderSave')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="offset-2 col-1" style="margin-top: 20px;"><h4>Фильтры</h4></div>
                    <div class="col-2">
                        <label for="filter_closed">Просмотренные/Непросмотр.</label>
                        <select name="filter_viewed" id="filter_viewed" class="form-control">
                            <option value="all">Все</option>
                            <option value="view">Просмотренные</option>
                            <option value="notView">Непросмотренные</option>
                        </select>
                    </div>
                    <div class="col-2">
                        <label for="filter_closed">Закрытые/незакрытые</label>
                        <select name="filter_closed" id="filter_closed" class="form-control">
                            <option value="all">Все</option>
                            <option value="closed">Закрытые</option>
                            <option value="notClosed">Незакрытые</option>
                        </select>
                    </div>
                    <div class="col-2">
                        <label for="filter_working">В работе/Не в работе</label>
                        <select name="filter_working" id="filter_working" class="form-control">
                            <option value="all">Все</option>
                            <option value="work">В Работе</option>
                            <option value="notWork">Не в работе</option>
                        </select>
                    </div>
                    <div class="col-2" style="margin-top: 20px;">
                        <button type="submit" class="btn btn-success" id="filter_list">Отфильтровать</button>
                    </div>
                </div>
            </form>
            <hr>
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>№ п/п</th>
                <th>Тема</th>
                <th>Пользователь</th>
                <th>Дата создания</th>
                <th>Статус</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $k => $order)
                <tr class="list-order">
                    <td>{{ $k+1 }}</td>
                    <td><a href="{{route('managementOrder',$order->id)}}">{{ $order->title }}</a></td>
                    <td>{{ $order->orderUser->name }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>@if ($order->closed_at != null) Закрытая @elseif ($order->working) Выполняется @elseif ($order->viewed_at != null) Просмотрена @else Не просмотрена @endif</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script src="{{ asset('js/orderList.js') }}" defer></script>
@endsection
