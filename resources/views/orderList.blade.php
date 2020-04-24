@extends('layouts.app')

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
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>№ п/п</th>
                    <th>Тема</th>
                    <th>Дата создания</th>
                    <th>Статус</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $k => $order)
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td><a href="">{{ $order->title }}</a></td>
                        <td>{{ $order->created_at }}</td>
                        <td>@if ($order->closed_at != null) Закрытая @elseif ($order->working) Выполняется @elseif ($order->viewed_at != null) Просмотрена @else Не просмотрена @endif</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
@endsection
