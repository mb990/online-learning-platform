@extends('layout.app')

<?php $title = 'Educators'; ?>

@section('content')

    <h2>Recently joined</h2>

    @foreach ($recentEducators as $recentEducator)

        <tr>
            <td>First name: {{$recentEducator->first_name}}</td><br>
            <td>Last name: {{$recentEducator->last_name}}</td><br>
            <td><a href="/educators/{{$recentEducator->user_id}}/view">View profile</a></td><br>
        </tr>

    @endforeach

@endsection
