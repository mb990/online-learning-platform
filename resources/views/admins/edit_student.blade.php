@extends('layout.app')
<?php $title = 'Edit student'; ?>

@section('content')

<form action="{{action('AdminsController@updateStudent', $student[0]->user_id)}}" method="POST">
    @csrf
    @method('PUT')
    <label for="first_name">First name</label>
    <input name="first_name" type="text" id="first_name" value="{{$student[0]->first_name}}" ><br>

    <label for="last_name">Last name</label>
    <input name="last_name" type="text" id="last_name" value="{{$student[0]->last_name}}"><br>

    <label for="age">Age</label>
    <input name="age" type="number" id="age" value="{{$student[0]->age}}"><br>

    <label for="linkedin">Linkedin</label>
    <input name="linkedin" type="url" id="linkedin" value="{{$student[0]->linkedin}}"><br>

    <label for="education">Education</label>
    <input name="education" type="text" id="education" value="{{$student[0]->education}}"><br>

    <label for="image_url">Image URL</label>
    <input name="image_url" type="url" id="image_url" value="{{$student[0]->image_url}}"><br>

    <label for="title">Title</label>
    <input name="title" type="text" id="title" value="{{$student[0]->title}}"><br>

    <label for="biography">Biography</label>
    <textarea name="biography" id="biography">{{$student[0]->biography}}</textarea><br>
    <button type="submit">Submit</button>
</form>

@endsection
</body>
</html>
