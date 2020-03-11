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

                        <a href="/admin/educators/{{$educator->id}}">View profile</a><br>

                            @if(!$educator->trashed())

                                <form action="{{action('AdminEducatorController@destroy', $educator->id)}}" method="POST">

                                    @method('DELETE')
                                    @csrf
                                    <input class="btn btn-danger" type="submit" value="Deactivate user">

                                </form>

                            @else

                                <form action="{{action('AdminEducatorController@retrieve', $educator->id)}}" method="GET">

                                    @csrf
                                    <input class="btn btn-success " type="submit" value="Retrieve user">

                                </form>

                        @endif

                    </div>

                </div>

                <hr>

            @endforeach

        @else

            <p class="p-3 mb-2 bg-warning text-dark">Trenutno nema edukatora.</p>

        @endif

    <div class="row justify-content-center">

        {{$educators->links()}}

    </div>

@endsection
