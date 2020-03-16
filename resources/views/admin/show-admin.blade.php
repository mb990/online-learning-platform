@extends('layouts.app')
@section('title')
    Pregledaj admina
@endsection

@section('content')

    <h2>Profil admina</h2><hr>

    <p class="lead"><strong>Id:</strong> {{$admin->id}}</p><br>
    <p class="lead"><strong>Ime:</strong> {{$admin->first_name}}</p><br>
    <p class="lead"><strong>Prezime:</strong> {{$admin->last_name}}</p><br>
    <p class="lead"><strong>Email:</strong> {{$admin->email}}</p><br>

    @endsection
    </body>
    </html>
