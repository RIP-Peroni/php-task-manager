<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="min-vh-100 d-flex flex-column">
<div id="app">
{{--    шапка--}}
<header class="flex-shrink-0">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                Менеджер задач                </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="#">
                            Задачи                            </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">
                            Статусы                           </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">
                            Метки                            </a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Вход</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Регистрация</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

{{--    контент--}}
<main class="container py-4">
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
    @include('flash::message')
    @yield('content')
</main>
{{--    подвал--}}
<footer class="border-top py-3 mt-5 flex-shrink-0">
    <div class="container-lg">
        <div class="text-center">
            <a href="https://github.com/RIP-Peroni" target="_blank">ripperoni</a>
        </div>
    </div>
</footer>
</div>
</body>
</html>
