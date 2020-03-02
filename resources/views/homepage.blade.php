@extends('layouts.app')
<?php $title = 'Homepage'; ?>
@section('content')

    <h3>Popular courses</h3>
{{--{{dd($count)}}--}}
    @foreach($courses as $course)

        id: {{$course->id}} <br>
        Course name: {{$course->name}} <br>
        Times purchased:  <br>
        Course description: {{$course->description}} <br>
        Course goals: {{$course->goals}} <br>
        Category: {{$course->category->name}} <br>
        Video: {{$course->video_url}} <hr>

    @endforeach



@endsection
