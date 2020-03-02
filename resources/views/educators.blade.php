@extends('layouts.app')

<?php $title = 'Educators'; ?>

@section('content')
{{--{{dd($recentEducators, $educators)}}--}}
    <h2>Recently joined</h2>

    @foreach ($recentEducators as $recentEducator)

        First name: {{$recentEducator->first_name}}<br>
        Last name: {{$recentEducator->last_name}}<br>
        <a href="/educators/{{$recentEducator->id}}/view">View profile</a><br>

    @endforeach

    <hr>

    <form action='{{action('PagesController@educators')}}' method="get">

        <input type="search" name="search">
        <span>
            <button type="submit">Search</button>
        </span>

    </form>
    <hr>

    <h2>All educators</h2>

    @foreach($educators as $educator)

        First name: {{$educator->first_name}}<br>
        Last name: {{$educator->last_name}}<br>
{{--        Role: {{$educator->role[0]->name}}<br>--}}
        <a href="/educators/{{$educator->id}}/view">View profile</a><br>

    @endforeach

@endsection
