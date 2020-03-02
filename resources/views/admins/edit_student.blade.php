@extends('layouts.app')
<?php $title = 'Edit student'; ?>

@section('content')

<form action="{{action('AdminsController@updateStudent', $student->id)}}" method="POST">
    @csrf
    @method('PUT')
    <label for="first_name">First name</label>
    <input name="first_name" type="text" id="first_name" value="{{$student->first_name}}" ><br>

    <label for="last_name">Last name</label>
    <input name="last_name" type="text" id="last_name" value="{{$student->last_name}}"><br>

    <label for="email">Email</label>
    <input name="email" type="text" id="email" value="{{$student->email}}"><br>

    <label for="password">Password</label>
    <input name="password" type="text" id="password" value="{{$student->password}}"><br>

    <label for="age">Age</label>
    <input name="age" type="number" id="age" value="{{$student->profile->age}}"><br>

    <label for="linkedin">Linkedin</label>
    <input name="linkedin" type="url" id="linkedin" value="{{$student->profile->linkedin}}"><br>

    <label for="education">Education</label>
    <input name="education" type="text" id="education" value="{{$student->profile->education}}"><br>

    <label for="image_url">Image URL</label>
    <input name="image_url" type="url" id="image_url" value="{{$student->profile->image_url}}"><br>

    <label for="title">Title</label>
    <input name="title" type="text" id="title" value="{{$student->profile->title}}"><br>

    <label for="biography">Biography</label>
    <textarea name="biography" id="biography">{{$student->profile->biography}}</textarea><br>
    <button type="submit">Submit</button>
</form>

@endsection
</body>
</html>
