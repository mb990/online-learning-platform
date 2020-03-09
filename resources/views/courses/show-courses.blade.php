@extends('layouts.app')
@section('title')
    Show courses
@endsection
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

                    <div class="col-md-4 text-center">

                        <a href="courses/{{$recentCourse->id}}">
                            <img src="{{$recentCourse->image_url}}" width="150" height="150" alt="course_image"><br>
                            <p class="lead">{{$recentCourse->name}}</p>
                        </a>

                    </div>

            @endforeach

    @endif

        </div><br><br>

        <div class="row justify-content-center">

            <h2 class="text-primary">All courses</h2>

        </div><br><br><br>

            <div class="row text-center">

                <div class="col-md-3">

                    <table style="min-width: 200px;">

                        @foreach($categories as $category)

                            <tr>

                                <td><a href="/category/{{$category->name}}">{{ ucfirst($category->name) }}</a></td>

                            </tr>

                        @endforeach

                    </table>

                </div>

                <div class="col-md-9">

                    <div class="row">

                        @foreach ($courses as $course)

                            <div class="col-md-4">

                                <a href="courses/{{$course->id}}">
                                    <img src="{{$course->image_url}}" width="150" height="150" alt="course_image"><br>
                                    <p class="lead">{{$course->name}}</p>
                                </a>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

    <div class="row justify-content-center">

        {{ $courses->links() }}

    </div>

@endsection
