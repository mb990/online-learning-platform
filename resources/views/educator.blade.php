@extends('layouts.app')

@section('title')
    Edukator
@endsection
{{--{{dd($user->createdCurses)}}--}}
@section('content')

    <div class="row text-center">

        <div class="col-md-12 jumbotron">

            <h1>Profil</h1>

        </div>

    </div>

    <div class="row">

        <div class="col-md-2">

            @if(!$user->profile->image_url)

                <img width="150" height="150" class="rounded-circle"
                     src="{{asset('storage/profile-images/default.png')}}" alt="educator-picture">

            @else

                <img width="150" height="150" class="rounded-circle" src="{{$user->profile->image_url}}"
                     alt="educator-picture">

            @endif

        </div>

        <div class="col-md-4">

            <br><br>
            <h2 class="text-primary"><strong>{{ucfirst($user->first_name)}} {{ucfirst($user->last_name)}}</strong></h2>

        </div>

        @auth

            @if($user->id === auth()->user()->id)

                <div class="offset-3 col-md-3">

                    <br><br><a class="lead" href="/profiles/{{$user->slug}}/edit">Izmeni</a>

                </div>

            @endif

        @endauth

    </div><br><br>

    <div class="row justify-content-center">

        <h2 class="text-primary"><strong>O PREDAVAČU</strong></h2>

    </div><br><br>

    <div class="row justify-content-center">

        @if($user->profile->biography)

            <p class="lead">{{$user->profile->biography}}</p>

        @else

            <p class="p-3 mb-2 bg-warning text-dark">Ovaj predavač trenutno nema svoj opis.</p>

        @endif

    </div><br><br>

    <div class="row justify-content-center">

        <h2 class="text-primary"><strong>KURSEVI</strong></h2>

    </div><br><br>

    <div class="row justify-content-center">

        @if($user->createdCourses)

            @foreach($user->createdCourses as $course)

                <div class="col-md-4 text-center">

                    <a href="/courses/{{$course->slug}}">
                        <img src="{{$course->image_url}}" width="150" height="150" alt="slika-kursa">
                        <p class="lead">{{$course->name}}</p>
                    </a>

                    @auth
                        @if(auth()->user()->id === $course->user_id)

                            <a href="/courses/{{$course->slug}}/edit">Izmeni</a>
                            <form action="{{action('CourseController@destroy', $course->slug)}}" method="POST">

                                @method('DELETE')
                                @csrf
                                <input class="btn btn-danger" type="submit" value="Obriši">

                            </form>

                            @if(!$course->active)
                                <p class="text-danger">Ovaj kurs sadrži nedozvoljen sadrzaj.</p>
                            @endif

                        @endif

                    @endif

                </div>

            @endforeach

        @else

            <p class="p-3 mb-2 bg-warning text-dark">Ovaj predavač nema kurseve.</p>

        @endif

    </div>

@endsection
