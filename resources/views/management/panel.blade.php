@extends('layouts.managerPanel')

@section('content')
    <div class="content" style="text-align: center;">
        <div class="row">
            <div class="col-lg-12">Панель менеджера | {{auth()->user()->name}}</div>
        </div>
        <div class="row">
        </div>
    </div>
@endsection
