@extends('layout.app')
<?php $title = 'Create new course' ?>

@section('content')

    <form action="{{action('CoursesController@store')}}" method="POST" xmlns="http://www.w3.org/1999/html">
        @csrf
        <label for="course_name">Course name</label>
        <input name="name" type="text" id="name"><br>

        <label for="description">Course description</label>
        <textarea name="description" id="description" placeholder="Course description"></textarea><br>

        <label for="goals">Course goals</label>
        <input name="goals" type="text" id="goals"><br>

        <label for="video_url">Video URL</label>
        <input name="video_url" type="url" id="video_url"><br>

        <label for="category">Category</label>
        <select name="category_id">
            <?php foreach ($categories as $category) { ?>
            <option value="<?php echo $category->name; ?>"><?php echo $category->name; ?></option>
            <?php } ?>
        </select><br>

        <button type="submit">Submit</button>
    </form>

    @endsection
    </body>
    </html>
