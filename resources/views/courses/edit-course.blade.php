@extends('layouts.app')
@section('title')
    Edit course
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading text-center">

                    <h3 class="text-info">Edit course</h3>

                </div>

                <div class="panel-body">

                    <form action="{{action('CoursesController@update', $course->id)}}" method="POST" xmlns="http://www.w3.org/1999/html">
                        @csrf
                        @method('PUT')
                        <label for="course_name">Course name</label>
                        <input class="form-control" name="name" type="text" id="name" value="{{$course->name}}"><br>

                        <label for="description">Course description</label>
                        <textarea class="form-control" name="description" id="description" placeholder="Course description">{{$course->description}}</textarea><br>

                        <label for="goals">Course goals</label>
                        <input class="form-control" name="goals" type="text" id="goals" value="{{$course->goals}}"><br>

                        <label for="video_url">Video URL</label>
                        <input class="form-control" name="video_url" type="url" id="video_url" value="{{$course->video_url}}"><br>

                        <label for="category">Category</label>
                        <select class="form-control" name="category_id">
                            <?php foreach ($categories as $category) { ?>
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                            <?php } ?>
                        </select><br>

                        <button class="btn btn-primary center-block" type="submit">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    @endsection
