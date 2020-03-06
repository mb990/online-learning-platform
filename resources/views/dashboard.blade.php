@extends('layouts.app')
@section('title')
    Dashboard
@endsection

@section('content')

    <div class="jumbotron text-center">
        <h1>Your dashboard</h1>
    </div>

    <div class="row text-center">

    @if(auth()->user()->roles[0]->name === 'educator')

        <div class="col-md-6">

            <h2>Create new course, buddy</h2>

        </div>

    @endif

        <div class="col-md-6">

            <h2>Your courses</h2>

            @if($courses)

            @foreach($courses as $course)

                <div class="col-md-4">

                    <a href="/courses/{{$course->id}}/view">
                        <img src="{{$course->image_url}}" width="150" height="150" alt="profile picture">
                        <p class="lead">{{$course->name}}</p><br>
                    </a>

                </div>

            @endforeach

            @else

                <p class="lead">You dont have courses.</p><br>

            @endif

        </div>

    </div>

@endsection
