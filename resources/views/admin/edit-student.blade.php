@extends('layouts.app')
@section('title')
    Edit student
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading text-center">

                    <h3 class="text-info">Edit student</h3>

                </div>

                <div class="panel-body">

                    <form action="{{action('AdminUserController@updateStudent', $student->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="first_name">First name</label>
                        <input class="form-control" name="first_name" type="text" id="first_name" value="{{$student->first_name}}" ><br>

                        <label for="last_name">Last name</label>
                        <input class="form-control" name="last_name" type="text" id="last_name" value="{{$student->last_name}}"><br>

                        <label for="email">Email</label>
                        <input class="form-control" name="email" type="text" id="email" value="{{$student->email}}"><br>

                        <label for="password">Password</label>
                        <input class="form-control" name="password" type="text" id="password" value="{{$student->password}}"><br>

{{--                        <label for="age">Age</label>--}}
{{--                        <input class="form-control"name="age" type="number" id="age" value="{{$student->profile->age}}"><br>--}}

{{--                        <label for="linkedin">Linkedin</label>--}}
{{--                        <input class="form-control" name="linkedin" type="url" id="linkedin" value="{{$student->profile->linkedin}}"><br>--}}

{{--                        <label for="education">Education</label>--}}
{{--                        <input class="form-control" name="education" type="text" id="education" value="{{$student->profile->education}}"><br>--}}

{{--                        <label for="image_url">Image URL</label>--}}
{{--                        <input class="form-control" name="image_url" type="url" id="image_url" value="{{$student->profile->image_url}}"><br>--}}

{{--                        <label for="title">Title</label>--}}
{{--                        <input class="form-control" name="title" type="text" id="title" value="{{$student->profile->title}}"><br>--}}

{{--                        <label for="biography">Biography</label>--}}
{{--                        <textarea class="form-control" name="biography" id="biography">{{$student->profile->biography}}</textarea><br>--}}

{{--                        <label for="role">role</label>--}}
                        <select class="form-control" name="role" id="role">

                            @foreach($roles as $role)

                                <option @if($role->id === $student->roles[0]->id) selected @endif value="{{$role->id}}">{{$role->name}}</option>

                            @endforeach

                        </select><br><br>

                        <button class="btn btn-primary center-block" type="submit">Submit</button>
                    </form><br>

                </div>
            </div>
        </div>
    </div>

@endsection
