@extends('layout.app')
<?php $title='Show user'; ?>

@section('content')

    <h2>Profile for User {{$user->id}}</h2>

    <form action="{{action('AdminsController@showEducator', $user->id)}}" method="GET">
        @csrf
        <tr>
            <td>First name: {{$user->first_name}}</td><br>
            <td>Last name: {{$user->last_name}}</td><br>
            <td>Age: {{$profile[0]->age}}</td><br>
            <td>Linkedin: {{$profile[0]->linkedin}}</td><br>
            <td>Education: {{$profile[0]->education}}</td><br>
            <td>Image: {{$profile[0]->image_url}}</td><br>
            <td>Title: {{$profile[0]->title}}</td><br>
            <td>Biography: {{$profile[0]->biography}}</td><br>
        </tr>
    </form>

    @endsection

    </body>
    </html>
