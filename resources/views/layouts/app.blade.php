<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/controlPanel.js') }}" defer></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <!-- Подключаем Bootstrap JS -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<nav class="menu navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('welcome')}}">Сайт подачи заявок</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item @if (Route::currentRouteName() == 'welcome')active @endif">
                <a class="nav-link" href="{{route('welcome')}}">Главная<span class="sr-only">(current)</span></a>
            </li>
            @can('view_admin_panel')
                <li class="nav-item @if (Route::currentRouteName() == 'admin')active @endif">
                    <a class="nav-link" href="{{route('admin')}}">Панель администратора</a>
                </li>
            @endcan
            @can('add_order')
                        <li class="nav-item @if (Route::currentRouteName() == 'order')active @endif">
                            <a class="nav-link" href="{{route('order')}}">Подать заявку</a>
                        </li>
            @endcan
            @can('show_list_orders')
                        <li class="nav-item @if (Route::currentRouteName() == 'orderList')active @endif">
                            <a class="nav-link" href="{{route('orderList')}}">Список Заявок </a>
                        </li>
            @endcan
            @can('view_manager_panel')
                <li class="nav-item @if (Route::currentRouteName() == 'panel')active @endif">
                    <a class="nav-link" href="{{route('panel')}}">Панель менеджера</a>
                </li>
            @endcan
            <li class="nav-item @if (Route::currentRouteName() == 'about')active @endif">
                <a class="nav-link" href="{{route('about')}}">О программе</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
        </ul>
    </div>
</nav>

@yield('content')

</body>
</html>
