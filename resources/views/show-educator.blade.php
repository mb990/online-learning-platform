@extends('layouts.app')
@section('title')
    Show single educator
@endsection

@section('content')

    <h2>Profile for educator {{$educator->id}}</h2><hr>

    <p class="lead"><strong>User id:</strong> {{$educator->id}}</p><br>
    <p class="lead"><strong>First name:</strong> {{$educator->first_name}}</p><br>
    <p class="lead"><strong>Last name:</strong> {{$educator->last_name}}</p><br>
    <p class="lead"><strong>Email:</strong> {{$educator->email}}</p><br>
    <p class="lead"><strong>Age:</strong> {{$educator->profile->age}}</p><br>
    <p class="lead"><strong>Linkedin:</strong> {{$educator->profile->linkedin}}</p><br>
    <p class="lead"><strong>Education:</strong> {{$educator->profile->education}}</p><br>
    <p class="lead"><strong>Image:</strong> {{$educator->profile->image_url}}</p><br>
    <p class="lead"><strong>Title:</strong> {{$educator->profile->title}}</p><br>
    <p class="lead"><strong>Biography:</strong> {{$educator->profile->biography}}</p><br>

    @endsection

    </body>
    </html>
