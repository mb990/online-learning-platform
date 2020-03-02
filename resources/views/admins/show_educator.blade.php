@extends('layouts.app')
<?php $title = 'Show single educator'; ?>

@section('content')

    <h2>Profile for User {{$educator->id}}</h2>

    First name: {{$educator->first_name}}<br>
    Last name: {{$educator->last_name}}<br>
    Age: {{$educator->profile->age}}<br>
    Linkedin: {{$educator->profile->linkedin}}<br>
    Education: {{$educator->profile->education}}<br>
    Image: {{$educator->profile->image_url}}<br>
    Title: {{$educator->profile->title}}<br>
    Biography: {{$educator->profile->biography}}<br>

@endsection

</body>
</html>
