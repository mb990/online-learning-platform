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

                    @if($user->hasRole('educator'))
                        <a href="/admin/educators/{{$user->id}}">View profile</a><br>
                    @else
                        <a href="/admin/students/{{$user->id}}">View profile</a><br>
                    @endif

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
