@extends('layouts.app')
@section('title')
    Edit profile
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading text-center">

                    <h3 class="text-info">Edit profile</h3>

                </div>

                <div class="panel-body">

                    <form action="{{action('ProfileController@update', $user->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="first_name">First name</label>
                        <input class="form-control" name="first_name" type="text" id="first_name" value="{{$user->first_name}}" ><br>

                        <label for="last_name">Last name</label>
                        <input class="form-control" name="last_name" type="text" id="last_name" value="{{$user->last_name}}"><br>

                        <label for="email">Email</label>
                        <input class="form-control" name="email" type="text" id="email" value="{{$user->email}}"><br>

{{--                        <label for="password">Password</label>--}}
                        <input class="form-control" name="password" type="hidden" id="password" value="{{$user->password}}"><br>

                        <label for="age">Age</label>
                        <input class="form-control" name="age" type="number" id="age" value="@if($user->profile) {{$user->profile->age}} @endif"><br>

                        <label for="linkedin">Linkedin</label>
                        <input class="form-control" name="linkedin" type="url" id="linkedin" value="@if($user->profile) {{$user->profile->linkedin}} @endif"><br>

                        <label for="education">Education</label>
                        <input class="form-control" name="education" type="text" id="education" value="@if($user->profile) {{$user->profile->education}} @endif"><br>

                        <label for="image_url">Image URL</label>
                        <input class="form-control" name="image_url" type="url" id="image_url" value="@if($user->profile) {{$user->profile->image_url}} @endif"><br>

                        <label for="title">Title</label>
                        <input class="form-control" name="title" type="text" id="title" value="@if($user->profile) {{$user->profile->title}} @endif"><br>

                        <label for="biography">Biography</label>
                        <textarea class="form-control" name="biography" id="biography">@if($user->profile) {{$user->profile->biography}} @endif</textarea><br>

{{--                        <label for="role">role</label>--}}
{{--                        <select name="role" id="role">--}}

{{--                            @if(!$user->roles)--}}

{{--                                <option disabled selected value> -- select an option -- </option>--}}

{{--                            @endif--}}

{{--                            @foreach($roles as $role)--}}

{{--                                <option @if($role->id === $user->roles[0]->id) selected @endif value="{{$role->id}}">{{$role->name}}</option>--}}

{{--                            @endforeach--}}

{{--                        </select>--}}
                        <br><br>

                        <button class="btn btn-primary center-block" type="submit">Submit</button>
                    </form><br>

                </div>
            </div>
        </div>
    </div>

@endsection
