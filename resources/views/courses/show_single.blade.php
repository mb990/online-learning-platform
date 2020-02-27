@extends('layout.app')
<?php $title = 'Show single course'; ?>

@section('content')

    <h2>Course {{$course->name}}</h2>

    <form action="{{action('CoursesController@showSingle', $course->id)}}" method="GET">
        @csrf
        <tr>
            <td>Description: {{$course->description}}</td><br>
            <td>Goals: {{$course->last_name}}</td><br>
            <td>Goals: {{$course->video_url}}</td><br>
            <td>Category: {{$category->name}}</td><br>
        </tr>
    </form>

    @endsection
    </body>
    </html>
