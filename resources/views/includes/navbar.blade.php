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
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ auth()->user()->first_name }} {{ auth()->user()->last_name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @if(auth()->user()->hasRole('educator'))
                            <a class="dropdown-item" href="/profiles/{{auth()->user()->profile->id}}">Moj profil</a>
                            <a class="dropdown-item" href="/dashboard">Moji kursevi</a>
                        @endif
                        @if(auth()->user()->hasRole('student'))
                            <a class="dropdown-item" href="/profiles/{{auth()->user()->profile->id}}">Moji kursevi</a>
                        @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                {{ __('Odjava') }}
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
