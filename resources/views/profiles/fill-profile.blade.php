@extends('layouts.app')
@section('title')
    Edit profile
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading text-center">

                    <h3 class="text-info">Fill profile</h3>

                </div>

                <div class="panel-body">

                    <form action="{{action('ProfileController@store', $user->slug)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <label for="age">Age</label>
                        <input class="form-control" name="age" type="number" id="age" placeholder="Age"><br>

                        <label for="linkedin">Linkedin</label>
                        <input class="form-control" name="linkedin" type="url" id="linkedin" placeholder="Your Linkedin url"><br>

                        <label for="education">Education</label>
                        <input class="form-control" name="education" type="text" id="education" placeholder="Your education"><br>

                        <label for="image_url">Image URL</label>
                        <input class="form-control" name="image_url" type="url" id="image_url" placeholder="Your profile picture"><br>

                        <label for="title">Title</label>
                        <input class="form-control" name="title" type="text" id="title" placeholder="Your title"><br>

                        <label for="biography">Biography</label>
                        <textarea class="form-control" name="biography" id="biography" placeholder="Enter your biography"></textarea><br>

{{--                        <label for="role">role</label><br><br>--}}
{{--                        <select disabled name="role" id="role">--}}

{{--                            <option selected value="{{$user->roles[0]->id}}">{{$user->roles[0]->name}}</option>--}}

{{--                        </select><br><br>--}}

                        <button class="btn btn-primary center-block" type="submit">Submit</button>
                    </form><br>

                </div>
            </div>
        </div>
    </div>

@endsection
