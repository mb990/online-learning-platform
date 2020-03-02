@extends('layouts.app')
<?php $title = 'Show all users'; ?>

@section('content')

    <h2>All users:</h2>

    @foreach ($users as $user)

        First name: {{$user->first_name}}<br>
        Last name: {{$user->last_name}}<br>
        Role: {{$user->role}}<br>
        <a href="/admin/users/{{$user->id}}/view">View profile</a><br>

    @endforeach

@endsection
</body>
</html>
