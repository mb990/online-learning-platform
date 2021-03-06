<div class="container-fluid">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
{{--                <li><a class="nav-link" href="/admin/">Admin panel</a></li>--}}
{{--                &nbsp | &nbsp--}}
                @auth

                    @if(auth()->user()->hasRole('admin'))

                        <li><a class="nav-link {{ Request::is('admin/educators') ? 'active' : '' }}"
                               href="/admin/educators">Predavači-admin</a></li>&nbsp | &nbsp
                        <li><a class="nav-link {{ Request::is('admin/courses') ? 'active' : '' }}"
                               href="/admin/courses">Kursevi-admin</a></li>&nbsp | &nbsp
                        <li><a class="nav-link {{ Request::is('admin/students') ? 'active' : '' }}"
                               href="/admin/students">Studenti</a></li>&nbsp | &nbsp
                        <li><a class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}"
                               href="/admin/users">Svi korisnici</a></li>&nbsp | &nbsp
                        <li><a class="nav-link {{ Request::is('admin/new') ? 'active' : '' }}"
                               href="/admin/new">Napravi admina</a></li>&nbsp | &nbsp

                    @endif

                @endauth

                    <li><a class="nav-link {{ Request::is('educators') ? 'active' : '' }}" href="/educators">Predavači</a></li>&nbsp | &nbsp
                    <li><a class="nav-link {{ Request::is('courses') ? 'active' : '' }}" href="/courses">Kursevi</a></li>

            </ul>

            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    {{--                @if (Route::has('register'))--}}
                    {{--                    <li class="nav-item">--}}
                    {{--                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                    {{--                    </li>--}}
                    {{--                @endif--}}
                @else
                    {{--                @auth--}}
                    {{--                    <li><a class="nav-link {{ Request::is('dahsboard') ? 'active' : '' }}" href="/dashboard">Dashboard</a></li>--}}
                    {{--                @endauth--}}
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ ucfirst(auth()->user()->first_name) }} {{ ucfirst(auth()->user()->last_name) }} <span
                                class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(auth()->user()->hasRole('educator'))
                                <a class="dropdown-item" href="/profiles/{{auth()->user()->slug}}">Moj profil</a>
                                <a class="dropdown-item" href="/my-courses">Moji kursevi</a>
                            @endif
                            @if(auth()->user()->hasRole('student'))
                                <a class="dropdown-item" href="/my-courses">Moji kursevi</a>
                            @endif
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
</div>
