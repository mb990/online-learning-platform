@extends('layouts.app')
<?php $title = 'Show course by category'; ?>

@section('content')

    <h2>All courses for category</h2>

    @foreach($courses as $course)

        Course name: {{$course->name}}<br>
        <a href="/courses/{{$course->id}}/view">View course</a><hr>

    @endforeach

@endsection
