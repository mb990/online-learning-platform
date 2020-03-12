@extends('layouts.app')
@section('title')
    Pregledaj predavaca
@endsection

@section('content')

    <h2>Profil predavaca</h2><hr>

    <p class="lead"><strong>Id:</strong> {{$educator->id}}</p><br>
    <p class="lead"><strong>Ime:</strong> {{$educator->first_name}}</p><br>
    <p class="lead"><strong>Prezime:</strong> {{$educator->last_name}}</p><br>
    <p class="lead"><strong>Email:</strong> {{$educator->email}}</p><br>
    <p class="lead"><strong>Godine:</strong> {{$educator->profile->age}}</p><br>
    <p class="lead"><strong>Linkedin:</strong> {{$educator->profile->linkedin}}</p><br>
    <p class="lead"><strong>Obrazovanje:</strong> {{$educator->profile->education}}</p><br>
    <p class="lead"><strong>Slika:</strong> {{$educator->profile->image_url}}</p><br>
    <p class="lead"><strong>Zvanje:</strong> {{$educator->profile->title}}</p><br>
    <p class="lead"><strong>Biografija:</strong> {{$educator->profile->biography}}</p><br>

@endsection

</body>
</html>
