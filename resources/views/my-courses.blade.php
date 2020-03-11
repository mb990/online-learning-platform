@extends('layouts.app')

@section('title')
    Moji kursevi
@endsection

@section('content')

    <div class="jumbotron text-center">

        <h1>Moji kursevi</h1>

    </div>

@if(auth()->user()->hasRole('educator'))
    <div class="row text-center">

        <div class="offset-4 col-md-4">

            <form action="/courses/new">

                <input type="submit" class="btn btn-lg btn-primary" value="Kreiraj kurs">

            </form>

        </div>

    </div><br><hr>

    <div class="row justify-content-center">

        @if($educatorCourses)

            @foreach($educatorCourses as $course)

                <div class="col-md-4 text-center">

                    <a href="/courses/{{$course->id}}">
                        <img src="{{$course->image_url}}" width="150" height="150" alt="slika-kursa">
                        <p class="lead">{{$course->name}}</p>
                    </a>
                    @if(auth()->user()->id === $course->user_id)

                        <a href="/courses/{{$course->id}}/edit">Izmeni</a>
                        <form action="{{action('EducatorController@destroy', $course->id)}}" method="POST">

                            @method('DELETE')
                            @csrf
                            <input class="btn btn-danger" type="submit" value="Obrisi">

                        </form>

                    @endif

                </div>

            @endforeach

        @else

            <div class="offset-3 col-md-6">

                <p class="p-3 mb-2 bg-warning text-dark">Trenutno nemate nijedan kurs.</p>

            </div>

        @endif

    </div>

@elseif(auth()->user()->hasRole('student'))

    <div class="row justify-content-center">

        @if($studentCourses)

            @foreach($studentCourses as $course)

                <div class="col-md-4 text-center">

                    <a href="/courses/{{$course->id}}">
                        <img src="{{$course->image_url}}" width="150" height="150" alt="slika-kursa">
                        <p class="lead">{{$course->name}}</p>
                    </a>
{{--                    @if(!$course->followedBy(auth()->user()->id))--}}

{{--                        <form action="{{action('StudentController@followCourse', $course->id)}}" method="POST">--}}

{{--                            @csrf--}}
{{--                            <input class="form-control" type="submit" value="Prijavi se">--}}

{{--                        </form>--}}

                    @if($course->followedBy(auth()->user()->id))

                        <form action="{{action('StudentController@unfollowCourse', $course->id)}}" method="POST">

                            @method('DELETE')
                            @csrf
                            <input class="form-control-odjava" type="submit" value="Odjavi se">

                        </form>

                    @endif

                </div>

            @endforeach

        @else

            <div class="offset-3 col-md-6">

                <p class="p-3 mb-2 bg-warning text-dark">Trenutno nemate nijedan kurs.</p>

            </div>

        @endif

    </div>

@else

    <p>Niste prijavljeni</p>

@endif

@endsection
