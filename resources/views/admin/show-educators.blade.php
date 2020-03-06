@extends('layouts.app')
@section('title')
    Show educators
@endsection

@section('content')

    <div class="jumbotron">
        <h1 class="text-center"> Educators </h1>
    </div>

        @if(count($educators))

            @foreach ($educators as $educator)

                <div class="row text-center">

                    <div class="col-md-4">

                        <p class="text-secondary"><strong>First name:</strong> {{$educator->first_name}}</p>
                        <p class="text-secondary"><strong>Last name:</strong> {{$educator->last_name}}</p>

                    </div>

                    <div class="col-md-4">

                        <a href="/admin/educators/{{$educator->id}}/view">View profile</a><br>
                        <a href="/admin/educators/{{$educator->id}}/edit">Edit profile</a><br><br>


                    </div>

                    <div class="col-md-4">
                        <form action="{{action('AdminsController@destroyEducator', $educator->id)}}" method="POST">

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

        {{$educators->links()}}

    </div>

@endsection
