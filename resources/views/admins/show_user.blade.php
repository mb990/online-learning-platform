@extends('layouts.app')
<?php $title='Show user'; ?>

@section('content')

    <h2>Profile for User {{$user->id}}</h2>

        First name: {{$user->first_name}}<br>
        Last name: {{$user->last_name}}<br>
        Age: {{$user->profile->age}}<br>
        Linkedin: {{$user->profile->linkedin}}<br>
        Education: {{$user->profile->education}}<br>
        Image: {{$user->profile->image_url}}<br>
        Title: {{$user->profile->title}}<br>
        Biography: {{$user->profile->biography}}<br>

@endsection

</body>
</html>
