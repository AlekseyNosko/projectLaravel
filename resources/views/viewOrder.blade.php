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
{{--        <form method="POST" action="{{route('orderSave')}}" enctype="multipart/form-data">--}}
{{--            <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}">--}}
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
                   {{$order->text}}
                </div>
            </div>
            <div class="row">
                <div class="offset-1 col-1">
                    <label for="file">Файл:</label>
                </div>
                <div class="col-2">
                    {{$order->file}}
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="offset-2 col-2">
                    <button type="submit" class="btn btn-warning">Закрыть заявку</button>
                </div>
            </div>
            <hr>
{{--        </form>--}}
    </div>
@endsection
