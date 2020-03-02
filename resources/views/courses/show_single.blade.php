@extends('layouts.app')
<?php $title = 'Show single course'; ?>

@section('content')

    <h2>Course {{$course->name}}</h2>

    Description: {{$course->description}}<br>
    Goals: {{$course->goals}}<br>
    Video: {{$course->video_url}}<br>
    Category: {{$course->category->name}}<br>

@endsection
