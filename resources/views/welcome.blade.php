@extends('layouts.app')

@section('content')
    <div class="content" style="text-align: center;">
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
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">Добро пожаловать {{auth()->user()->name}}</div>
        </div>
        <div class="row">
            @can('add_order')
            <div class="col-lg-6">
                 Вы можете подать заявку <a href="{{ route('order') }}" class="btn btn-primary">Подать заявку</a>
            </div>
            @endcan
            @can('show_list_orders')
            <div class="col-lg-6">
                или посмотреть список своих заявок <a href="{{ route('orderList') }}" class="btn btn-success">Список заявок</a>
            </div>
            @endcan
        </div>
    @can('view_manager_panel')
            <div class="row">
                <div class="col-12">
                    Перейти к работе <a href="{{ route('panel') }}" class="btn btn-primary">Панель менеджера</a>
                </div>
            </div>
    @endcan
</div>
@endsection
