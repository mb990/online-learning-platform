@extends('layouts.app')
@section('title')
    Pregledaj predavaca
@endsection

@section('content')

    <h2>Profil predavaca</h2><hr>

    <img src="{{$educator->profile->image_url}}" width="150" height="150" alt="profile picture">

    <p><strong>Id:</strong> {{$educator->id}}</p><br>
    <p><strong>Ime:</strong> {{$educator->first_name}}</p><br>
    <p><strong>Prezime:</strong> {{$educator->last_name}}</p><br>
    <p><strong>Email:</strong> {{$educator->email}}</p><br>
    <p><strong>Godine:</strong> {{$educator->profile->age}}</p><br>
    <p><strong>Linkedin:</strong> {{$educator->profile->linkedin}}</p><br>
    <p><strong>Obrazovanje:</strong> {{$educator->profile->education}}</p><br>
    <p><strong>Zvanje:</strong> {{$educator->profile->title}}</p><br>
    <p><strong>Biografija:</strong> {{$educator->profile->biography}}</p><br>

@endsection

</body>
</html>
