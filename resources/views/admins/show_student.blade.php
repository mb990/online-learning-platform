@extends('layout.app')
<?php $title = 'Show single student'; ?>

@section('content')

    <h2>Profile for User {{$student[0]->user_id}}</h2>

    <form action="{{action('AdminsController@showStudent', $student[0]->user_id)}}" method="GET">
        @csrf
        <tr>
            <td>First name: {{$student[0]->first_name}}</td><br>
            <td>Last name: {{$student[0]->last_name}}</td><br>
            <td>Age: {{$student[0]->age}}</td><br>
            <td>Linkedin: {{$student[0]->linkedin}}</td><br>
            <td>Education: {{$student[0]->education}}</td><br>
            <td>Image: {{$student[0]->image_url}}</td><br>
            <td>Title: {{$student[0]->title}}</td><br>
            <td>Biography: {{$student[0]->biography}}</td><br>
        </tr>
    </form>

@endsection
</body>
</html>
