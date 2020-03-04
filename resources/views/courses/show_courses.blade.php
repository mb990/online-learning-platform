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

    <div class="jumbotron">
        <h1 class="text-center">Courses</h1>
    </div>

    <div class="row justify-content-center">

        <h2 class="text-primary">Recently added courses</h2>

    </div><br><br><br>

    @if(count($recentCourses))

        <div class="row">

            @foreach($recentCourses as $recentCourse)

                    <div class="col-md-4">

{{--                        <p class="text-secondary"><strong>Course name:</strong> {{$recentCourse->name}}</p>--}}
                        <a href="courses/{{$recentCourse->id}}/view">
                            <img src="https://traininginbhopal.com/wp-content/uploads/2019/11/certificate-flat.png" alt="{{$recentCourse->name}} . 'image'">
                        </a>

                    </div>

            @endforeach

    @endif

        </div><br><br>

            <div class="row text-center">

                <div class="col-md-3">

                    <table>

                        @foreach($categories as $category)

                            <tr>

                                <td><a href="/category/{{$category->id}}/view">{{$category->name}}</a></td>

                            </tr>

                        @endforeach

                    </table>

                </div>

            @foreach ($courses as $course)

                <div class="col-md-3">

                    <a href="courses/{{$course->id}}/view">
                        <img src="https://traininginbhopal.com/wp-content/uploads/2019/11/certificate-flat.png" alt="{{$course->name}} . 'image'">
                    </a>
                    <p class="lead">{{$course->name}}</p>

                </div>

            @endforeach

            </div>

@endsection
