@extends('layouts.app')
<?php $title = 'Edit educator'; ?>

@section('content')

<form action="{{action('AdminsController@updateEducator', $educator[0]->user_id)}}" method="POST">
    @csrf
    @method('PUT')
    <label for="first_name">First name</label>
    <input name="first_name" type="text" id="first_name" value="{{$educator[0]->first_name}}" ><br>

    <label for="last_name">Last name</label>
    <input name="last_name" type="text" id="last_name" value="{{$educator[0]->last_name}}"><br>

    <label for="age">Age</label>
    <input name="age" type="number" id="age" value="{{$educator[0]->age}}"><br>

    <label for="linkedin">Linkedin</label>
    <input name="linkedin" type="url" id="linkedin" value="{{$educator[0]->linkedin}}"><br>

    <label for="education">Education</label>
    <input name="education" type="text" id="education" value="{{$educator[0]->education}}"><br>

    <label for="image_url">Image URL</label>
    <input name="image_url" type="url" id="image_url" value="{{$educator[0]->image_url}}"><br>

    <label for="title">Title</label>
    <input name="title" type="text" id="title" value="{{$educator[0]->title}}"><br>

    <label for="biography">Biography</label>
    <textarea name="biography" id="biography">{{$educator[0]->biography}}</textarea><br>
    <button type="submit">Submit</button>
</form>

@endsection
</body>
</html>
