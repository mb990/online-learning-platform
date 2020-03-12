@extends('layouts.app')
@section('title')
    Edit educator
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading text-center">

                    <h3 class="text-info">Edit educator</h3>

                </div>

                <div class="panel-body">

                    <form action="{{action('AdminUserController@updateEducator', $educator->slug)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="first_name">First name</label>
                        <input class="form-control" name="first_name" type="text" id="first_name" value="{{$educator->first_name}}" ><br>

                        <label for="last_name">Last name</label>
                        <input class="form-control" name="last_name" type="text" id="last_name" value="{{$educator->last_name}}"><br>

                        <label for="email">Email</label>
                        <input class="form-control" name="email" type="text" id="email" value="{{$educator->email}}"><br>

                        <label for="password">Password</label>
                        <input class="form-control" name="password" type="text" id="password" value="{{$educator->password}}"><br>

                        <label for="age">Age</label>
                        <input class="form-control" name="age" type="number" id="age" value="{{$educator->profile->age}}"><br>

                        <label for="linkedin">Linkedin</label>
                        <input class="form-control" name="linkedin" type="url" id="linkedin" value="{{$educator->profile->linkedin}}"><br>

                        <label for="education">Education</label>
                        <input class="form-control" name="education" type="text" id="education" value="{{$educator->profile->education}}"><br>

                        <label for="image_url">Image URL</label>
                        <input class="form-control" name="image_url" type="url" id="image_url" value="{{$educator->profile->image_url}}"><br>

                        <label for="title">Title</label>
                        <input class="form-control" name="title" type="text" id="title" value="{{$educator->profile->title}}"><br>

                        <label for="biography">Biography</label>
                        <textarea class="form-control" name="biography" id="biography">{{$educator->profile->biography}}</textarea><br>

                        <label for="role">role</label>
                        <select name="role" id="role">

                            @foreach($roles as $role)

                                <option @if($role->id === $educator->roles[0]->id) selected @endif value="{{$role->id}}">{{$role->name}}</option>

                            @endforeach

                        </select><br><br>

                        <button class="btn btn-primary center-block" type="submit">Submit</button>
                    </form><br>

                </div>
            </div>
        </div>
    </div>

@endsection
