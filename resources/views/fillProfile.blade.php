@extends('layouts.app')
<?php $title = 'Edit profile'; ?>

@section('content')

    <div class="row justify-content-center">
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading text-center">

                    <h3 class="text-info">Fill profile</h3>

                </div>

                <div class="panel-body">

                    <form action="{{action('UsersController@updateProfile', $user->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <label for="age">Age</label>
                        <input class="form-control" name="age" type="number" id="age"><br>

                        <label for="linkedin">Linkedin</label>
                        <input class="form-control" name="linkedin" type="url" id="linkedin"><br>

                        <label for="education">Education</label>
                        <input class="form-control" name="education" type="text" id="education"><br>

                        <label for="image_url">Image URL</label>
                        <input class="form-control" name="image_url" type="url" id="image_url"><br>

                        <label for="title">Title</label>
                        <input class="form-control" name="title" type="text" id="title"><br>

                        <label for="biography">Biography</label>
                        <textarea class="form-control" name="biography" id="biography"></textarea><br>

                        <label for="role">role</label>
                        <select disabled name="role" id="role">

                            <option selected value="{{$user->roles[0]->id}}">{{$user->roles[0]->name}}</option>

                        </select><br><br>

                        <button class="btn btn-primary center-block" type="submit">Submit</button>
                    </form><br>

                </div>
            </div>
        </div>
    </div>

@endsection
