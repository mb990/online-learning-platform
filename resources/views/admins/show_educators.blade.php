@extends('layouts.app')
<?php $title = 'Show educators'; ?>

@section('content')

    <h2>All educators:</h2>
{{--    {{dd($educators)}}--}}
    @foreach ($educators as $educator)

        First name: {{$educator->first_name}}<br>
        Last name: {{$educator->last_name}}<br>
        Role: {{$educator->roles[0]->name}}<br>
        <a href="/admin/educators/{{$educator->id}}/view">View profile</a><br>
        <a href="/admin/educators/{{$educator->id}}/edit">Edit profile</a>

        <form action="{{action('AdminsController@destroyEducator', $educator->id)}}" method="POST">

            @method('DELETE')
            @csrf
            <input type="submit" value="Delete user">

        </form>

    @endforeach

@endsection
</body>
</html>
