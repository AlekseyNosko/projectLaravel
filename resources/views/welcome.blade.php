@extends('layouts.app')

@section('content')
    <div class="content" style="text-align: center;">
        <div class="row">
            <div class="col-lg-12">Добро пожаловать {{auth()->user()->name}}</div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                 Вы можете подать заявку <a href="{{ route('order') }}" class="btn btn-primary">Подать заявку</a>
            </div>
            <div class="col-lg-6">
                или посмотреть список своих заявок <a href="{{ route('orderList') }}" class="btn btn-success">Список заявок</a>
            </div>
        </div>
    </div>
@endsection
