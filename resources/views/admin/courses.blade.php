@extends('layouts.app')
@section('title')
    Kursevi
@endsection

@section('content')

    <div class="jumbotron">
        <h1 class="text-center">Kursevi</h1>
    </div>

    @if(count($courses))

        @foreach ($courses as $course)

            <div class="row text-center">

                <div class="col-md-4">

                    <a href="/courses/{{$course->slug}}">
                        <p class="text-secondary"><strong>Ime:</strong> {{ucfirst($course->name)}}</p>
                    </a>
                    <a href="/admin/educators/{{$course->owner->slug}}">
                        <p class="text-secondary"><strong>Predavač:</strong> {{$course->owner->first_name}} {{$course->owner->last_name}}</p>
                    </a>
                    <a href="/category/{{$course->category->slug}}">
                        <p class="text-secondary"><strong>Kategorija:</strong> {{ucfirst($course->category->name)}}</p>
{{--                    <p class="text-secondary"><strong>Prezime:</strong> {{$course->last_name}}</p>--}}
                    </a>
                </div>

                <div class="col-md-4"><br>

                    @if($course->active)

                        <form action="{{action('AdminCourseController@deactivate', $course->slug)}}" method="POST">

                            @method('PUT')
                            @csrf
                            <input class="btn btn-danger" type="submit" value="Deaktiviraj">

                        </form>

                    @else

                        <form action="{{action('AdminCourseController@activate', $course->slug)}}" method="POST">

                            @method('PUT')
                            @csrf
                            <input class="btn btn-success " type="submit" value="Aktiviraj">

                        </form>

                    @endif

                </div>

                <div class="col-md-4"><br>

                    <form action="{{action('AdminCourseController@destroy', $course->slug)}}" method="POST">

                        @method('DELETE')
                        @csrf
                        <input class="btn btn-danger" type="submit" value="Obriši">

                    </form>

                </div>

            </div>

            <hr>

        @endforeach

    @else

        <p class="p-3 mb-2 bg-warning text-dark">Trenutno nema kurseva.</p>

    @endif

    <div class="row justify-content-center">

        {{$courses->links()}}

    </div>

@endsection
