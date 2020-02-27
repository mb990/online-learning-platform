@extends('layout.app')
<?php $title = 'Homepage'; ?>
@section('content')

    <h3>Popular courses</h3>

    @foreach($courses as $course)
{{--        <form action="{{action('CoursesController@showPopularCourses', $course->id)}}" method="GET">--}}
            @csrf
            <tr>
                <td>Course name: {{$course->name}}</td><br>
                <td>Times purchased: {{$course->count}}</td><br>
{{--                <td>Description: {{$course->description}}</td><br>--}}
{{--                <td>Goals: {{$course->goals}}</td><br>--}}
                <td>Video: {{$course->video_url}}</td><br>
{{--                <td>Category: {{$category->name}}</td><br>--}}
            </tr>
{{--        </form>--}}
    @endforeach
@endsection
