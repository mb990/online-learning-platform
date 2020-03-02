@extends('layouts.app')
<?php $title = 'Show single student'; ?>

@section('content')

    <h2>Profile for User {{$student->id}}</h2>

        First name: {{$student->first_name}}<br>
        Last name: {{$student->last_name}}<br>
        Age: {{$student->profile->age}}<br>
        Linkedin: {{$student->profile->linkedin}}<br>
        Education: {{$student->profile->education}}<br>
        Image: {{$student->profile->image_url}}<br>
        Title: {{$student->profile->title}}<br>
        Biography: {{$student->profile->biography}}<br>

@endsection
</body>
</html>
