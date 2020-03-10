@extends('layouts.app')
@section('title')
    Izmeni profil
@endsection

@section('content')

    @if($user->id !== auth()->user()->id)

        <div class="row justify-content-center">

            <div class="col-md-6">

                <img width="400" height="400" src="https://images.8tracks.com/cover/i/000/104/534/3973376_700b-5093.jpg?rect=67,0,565,565&q=98&fm=jpg&fit=max" alt="">

            </div>

        </div>

    @else

        <div class="row justify-content-center">
            <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">

                        <h3 class="text-info">Izmeni profil</h3>

                    </div>

                    <div class="panel-body">

                        <form action="{{action('ProfileController@update', $user->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <label for="first_name">Ime</label>
                            <input class="form-control" name="first_name" type="text" id="first_name" value="{{$user->first_name}}" ><br>

                            <label for="last_name">Prezime</label>
                            <input class="form-control" name="last_name" type="text" id="last_name" value="{{$user->last_name}}"><br>

    {{--                        <label for="email">Email</label>--}}
    {{--                        <input class="form-control" name="email" type="text" id="email" value="{{$user->email}}"><br>--}}

    {{--                        <label for="password">Password</label>--}}
    {{--                        <input class="form-control" name="password" type="hidden" id="password" value="{{$user->password}}"><br>--}}

                            <label for="age">Godine</label>
                            <input class="form-control" name="age" type="number" id="age" placeholder="Age" value={{$user->profile->age}}><br>

                            <label for="linkedin">Linkedin</label>
                            <input class="form-control" name="linkedin" type="url" id="linkedin" placeholder="Your linkedin url" value="{{$user->profile->linkedin}}"><br>

                            <label for="education">Obrazovanje</label>
                            <input class="form-control" name="education" type="text" id="education" placeholder="Your education" value="{{$user->profile->education}}"><br>

                            <label for="image_url">Profilna slika</label>
                            <input class="form-control" name="image_url" type="url" id="image_url" placeholder="Your profile picture" value="{{$user->profile->image_url}}"><br>

                            <label for="title">Zvanje</label>
                            <input class="form-control" name="title" type="text" id="title" placeholder="Your title" value="{{$user->profile->title}}"><br>

                            <label for="biography">Biografija</label>
                            <textarea class="form-control" name="biography" placeholder="Enter you biography" id="biography">{{$user->profile->biography}}</textarea><br>

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

                            <button class="btn btn-primary center-block" type="submit">Potvrdi</button>
                        </form><br>

                    </div>
                </div>
            </div>
        </div>

    @endif

@endsection
