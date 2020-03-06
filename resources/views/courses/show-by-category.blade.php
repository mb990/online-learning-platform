@extends('layouts.app')
@section('title')
    Show course by category
@endsection

@section('content')

    <div class="row text-center">

        <div class="col-md-12">

            <h1>{{ ucfirst($category->name) }} courses</h1><br>

        </div>

    </div>

    <div class="row text-center">

        @if(count($courses))

            @foreach($courses as $course)

                <div class="col-md-4">

                    <a href="/courses/{{$course->id}}/view">

                        <iframe width="300" height="155" src="{{$course->video_url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <p class="lead"><strong>Course name:</strong> {{$course->name}}</p>

                    </a>

                </div>

            @endforeach

        @else

         <p class="lead">No courses for this category.</p>

        @endif

    </div>

@endsection
