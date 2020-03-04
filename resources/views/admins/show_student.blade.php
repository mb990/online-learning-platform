@extends('layouts.app')
<?php $title = 'Show single student'; ?>

@section('content')

    <h2>Profile for student {{$student->id}}</h2><hr>

    <p class="lead"><strong>User id:</strong> {{$student->id}}</p><br>
    <p class="lead"><strong>First name:</strong> {{$student->first_name}}</p><br>
    <p class="lead"><strong>Last name:</strong> {{$student->last_name}}</p><br>
    <p class="lead"><strong>Email:</strong> {{$student->email}}</p><br>
    <p class="lead"><strong>Age:</strong> {{$student->profile->age}}</p><br>
    <p class="lead"><strong>Linkedin:</strong> {{$student->profile->linkedin}}</p><br>
    <p class="lead"><strong>Education:</strong> {{$student->profile->education}}</p><br>
    <p class="lead"><strong>Image:</strong> {{$student->profile->image_url}}</p><br>
    <p class="lead"><strong>Title:</strong> {{$student->profile->title}}</p><br>
    <p class="lead"><strong>Biography:</strong> {{$student->profile->biography}}</p><br>

@endsection
</body>
</html>
