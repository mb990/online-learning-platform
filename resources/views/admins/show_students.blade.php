@extends('layouts.app')
<?php $title = 'Show students'; ?>

@section('content')

<h2>All students:</h2>

@foreach ($students as $student)

    <tr>
        <td>First name: {{$student->first_name}}</td><br>
        <td>Last name: {{$student->last_name}}</td><br>
        <td><a href="/admin/students/{{$student->id}}/view">View profile</a></td><br>
        <td><a href="/admin/students/{{$student->id}}/edit">Edit</a></td>
    </tr>
    <form action="{{action('AdminsController@showStudent', $student->id)}}" method="GET">

        @csrf

    </form>
@endforeach

@endsection
</body>
</html>
