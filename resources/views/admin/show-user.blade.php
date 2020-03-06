@extends('layouts.app')
@section('title')
    Show user
@endsection

@section('content')

    <h2>Profile for user {{$user->first_name}} {{$user->last_name}}</h2><hr>

    <p class="lead"><strong>User id:</strong> {{$user->id}}</p><br>
    <p class="lead"><strong>First name:</strong> {{$user->first_name}}</p><br>
    <p class="lead"><strong>Last name:</strong> {{$user->last_name}}</p><br>
    <p class="lead"><strong>Email:</strong> {{$user->email}}</p><br>
    <p class="lead"><strong>Age:</strong> {{$user->profile->age}}</p><br>
    <p class="lead"><strong>Linkedin:</strong> {{$user->profile->linkedin}}</p><br>
    <p class="lead"><strong>Education:</strong> {{$user->profile->education}}</p><br>
    <p class="lead"><strong>Image:</strong> {{$user->profile->image_url}}</p><br>
    <p class="lead"><strong>Title:</strong> {{$user->profile->title}}</p><br>
    <p class="lead"><strong>Biography:</strong> {{$user->profile->biography}}</p><br>

@endsection
