@extends('layouts.app')
@section('title')
    Show all users
@endsection

@section('content')

    <div class="jumbotron">
        <h1 class="text-center"> All users</h1>
    </div>

    @if(count($users))
        {{--    {{dd($educators)}}--}}
        @foreach ($users as $user)

            <div class="row text-center">

                <div class="col-md-4">

                    <p class="text-secondary"><strong>First name:</strong> {{$user->first_name}}</p>
                    <p class="text-secondary"><strong>Last name:</strong> {{$user->last_name}}</p>
                    {{--                            <p class="text-secondary"><strong>Role:</strong> {{$educator->roles[0]->name}}</p><br>--}}


                </div>

                <div class="col-md-4">

                    <a href="/admin/educators/{{$user->id}}/view">View profile</a><br>
                    <a href="/admin/educators/{{$user->id}}/edit">Edit profile</a><br><br>


                </div>

                <div class="col-md-4">
                    <form action="{{action('AdminsController@destroyEducator', $user->id)}}" method="POST">

                        @method('DELETE')
                        @csrf
                        <input class="btn btn-danger" type="submit" value="Delete user">

                    </form>

                </div>


            </div>

            <hr>

        @endforeach

    @else

        <p>No educators to show.</p>

    @endif

    <div class="row justify-content-center">

        {{$users->links()}}

    </div>

@endsection
