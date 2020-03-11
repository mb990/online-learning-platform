@extends('layouts.app')
@section('title')
    Kreiraj admina
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading text-center">

                    <h3 class="text-info">Novi admin</h3>

                </div><br>

                <div class="panel-body">

                    <form action="{{action('AdminUserController@storeAdmin')}}" method="POST" xmlns="http://www.w3.org/1999/html">
                        @csrf
                        <label for="course_name">Ime</label>
                        <input class="form-control" name="first_name" type="text" id="first_name" placeholder="Ime"><br>

                        <label for="last_name">Prezime</label>
                        <input class="form-control" name="last_name" id="last_name" placeholder="Prezime"></input><br>

                        <label for="email">Email</label>
                        <input class="form-control" name="email" type="email" id="email" placeholder="Email"><br>

                        <label for="password">Password</label>
                        <input class="form-control" name="password" type="password" id="password" placeholder="Password"><br>

                        <button class="btn btn-primary" type="submit">Potvrdi</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
