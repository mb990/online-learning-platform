@extends('layouts.app')
@section('title')
    Pregledaj korisnika
@endsection

@section('content')

    <h2>Profil korisnika {{$user->first_name}} {{$user->last_name}}</h2><hr>

    <p class="lead"><strong>Id:</strong> {{$user->id}}</p><br>
    <p class="lead"><strong>Ime:</strong> {{$user->first_name}}</p><br>
    <p class="lead"><strong>Prezime:</strong> {{$user->last_name}}</p><br>
    <p class="lead"><strong>Email:</strong> {{$user->email}}</p><br>
    @if($user->hasRole('educator'))
        <p class="lead"><strong>Godine:</strong> {{$user->profile->age}}</p><br>
        <p class="lead"><strong>Linkedin:</strong> {{$user->profile->linkedin}}</p><br>
        <p class="lead"><strong>Obrazovanje:</strong> {{$user->profile->education}}</p><br>
        <p class="lead"><strong>Slika:</strong> {{$user->profile->image_url}}</p><br>
        <p class="lead"><strong>Zvanje:</strong> {{$user->profile->title}}</p><br>
        <p class="lead"><strong>Biografija:</strong> {{$user->profile->biography}}</p><br>
    @endif

@endsection
