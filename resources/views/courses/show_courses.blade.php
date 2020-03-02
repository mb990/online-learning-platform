@extends('layouts.app')
<?php $title = 'Show courses'; ?>
<style>

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

</style>


@section('content')
{{--    {{dd($courses)}}--}}

    <h2>Recently added courses</h2>

    @foreach($recentCourses as $recentCourse)

        Course name: {{$recentCourse->name}}<br>

    @endforeach

    <hr>

<table>

    @foreach($categories as $category)

        <tr>

            <td><a href="/category/{{$category->id}}/view">{{$category->name}}</a></td>

        </tr>

    @endforeach

</table>

    <hr>

    <h2>All courses:</h2>

    @foreach ($courses as $course)

        Course name: {{$course->name}}<br>
        <a href="/courses/{{$course->id}}/view">View course</a><hr>

    @endforeach

@endsection
