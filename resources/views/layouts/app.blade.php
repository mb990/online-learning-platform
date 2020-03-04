<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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

        <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li><a class="nav-link" href="/admin/">Admin panel</a></li>&nbsp | &nbsp
                    @if(Request::is('admin') OR Request::is('admin/*'))
                        <li><a class="nav-link {{ Request::is('admin/educators') ? 'active' : '' }}" href="/admin/educators">Show all educators</a></li>&nbsp | &nbsp
                        <li><a class="nav-link {{ Request::is('admin/students') ? 'active' : '' }}" href="/admin/students">Show all students</a></li>&nbsp | &nbsp
                        <li><a class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}" href="/admin/users">Show all users</a></li>
                    @else
                        <li><a class="nav-link {{ Request::is('educators') ? 'active' : '' }}" href="/educators">Show educators</a></li>&nbsp | &nbsp
                        <li><a class="nav-link {{ Request::is('courses') ? 'active' : '' }}" href="/courses">Show courses</a></li>
                    @endif
                </ul>

                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
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
