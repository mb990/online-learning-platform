<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

@include('includes.navbar')

        @if(Request::is('/'))

            <div class="container-fluid">

                <div class="jumbotron text-center">
                    <h1 class="text-primary">Edukacija za nove generacije</h1>
                </div>

            </div>

        @endif

        <main class="container">
            @if(!Request::is('/'))
                <a class="btn btn-default" onclick="history.go(-1);">Back</a>
            @endif
            @yield('content')
        </main>
    </div>
</body>
</html>