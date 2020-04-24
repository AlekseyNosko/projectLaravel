<nav class=" navbar navbar-expand-lg navbar-light bg-light">
    <a class=" navbar-brand" href="{{route('welcome')}}">Подача заявок</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item @if (Route::currentRouteName() == 'welcome')active @endif">
                <a class="nav-link" href="{{route('welcome')}}">Главная<span class="sr-only">(current)</span></a>
            </li>
{{--            <li class="nav-item @if (Route::currentRouteName() == 'about')active @endif">--}}
{{--                <a class="nav-link" href="{{route('about')}}">О компании</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item @if (Route::currentRouteName() == 'auto-park')active @endif">--}}
{{--                <a class="nav-link" href="#">Автопарк</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item @if (Route::currentRouteName() == 'reviews')active @endif">--}}
{{--                <a class="nav-link" href="#">Отзывы</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item @if (Route::currentRouteName() == 'contacts')active @endif">--}}
{{--                <a class="nav-link" href="{{route('contacts')}}">Контакты </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item @if (Route::currentRouteName() == 'trans')active @endif">--}}
{{--                <button class="btn btn-primary">Заказать перевозку</button>--}}
{{--            </li>--}}
        </ul>
    </div>
</nav>
