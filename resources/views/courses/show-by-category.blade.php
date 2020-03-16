@extends('layouts.app')
@section('title')
    Kategorije
@endsection

@section('content')

    <div class="row text-center">

        <div class="col-md-12">

            <h1>{{ ucfirst($category->name) }} kursevi</h1><br>

        </div>

    </div>

    <div class="row text-center">

        @if(count($courses))

            @foreach($courses as $course)

                <div class="col-md-4">

                    <a href="/courses/{{$course->slug}}">

{{--                        <iframe width="300" height="155" src="{{$course->video_url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
                        <video src="{{$course->video_url}}" width="300" height="150" controls>Video nije podržan</video>
                        <p class="lead">{{$course->name}}</p>

                    </a>

                </div>

            @endforeach

        @else

            <div class="offset-4 col-md-4">

                <p class="p-3 mb-2 bg-warning text-dark">Ova kategorija nema kreirane kurseve.</p>

            </div>

        @endif

    </div>

@endsection
