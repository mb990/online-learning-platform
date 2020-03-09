@extends('layouts.app')

@section('title')
    My profile
@endsection
{{--{{dd($user->createdCurses)}}--}}
@section('content')

    <div class="row">

        <div class="col-md-2">

            <img width="150" height="150" class="rounded-circle" src="{{$user->profile->image_url}}" alt="educator-picture">

        </div>

        <div col-md-4>

            <br><br><h2 class="text-primary"><strong>{{$user->first_name}} {{$user->last_name}}</strong></h2>

        </div>

    </div><br><br>

    <div class="row justify-content-center">

        <h2 class="text-primary"><strong>O PREDAVACU</strong></h2>

    </div><br><br>

    <div class="row">

        @if($user->profile->biography)

            <p class="lead">{{$user->profile->biography}}</p>

        @else

            <p class="p-3 mb-2 bg-warning text-dark">Ovaj predavac trenutno nema svoj opis.</p>

        @endif

    </div><br><br>

    <div class="row justify-content-center">

        <h2 class="text-primary"><strong>KURSEVI</strong></h2>

    </div><br><br>

    <div class="row">

        @if($user->createdCourses)

            @foreach($user->createdCourses as $course)

                <div class="col-md-4">

                    <a href="/courses/{{$course->id}}">
                        <img src="{{$course->image_url}}" alt="slika-kursa">
                        <p class="lead">{{$course->name}}</p>
                    </a>

                </div>

            @endforeach

        @else

            <p class="p-3 mb-2 bg-warning text-dark">Ovaj predavac nema kurseve.</p>

        @endif

    </div>

@endsection
