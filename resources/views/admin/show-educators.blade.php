@extends('layouts.app')
@section('title')
    Predavači
@endsection

@section('content')

    <div class="jumbotron">
        <h1 class="text-center">Predavači</h1>
    </div>

    @if(count($educators))

        @foreach ($educators as $educator)

            <div class="row text-center">

                <div class="col-md-4">

                    <a href="/admin/educators/{{$educator->slug}}">

                        <p class="text-secondary"><strong>Predavač:</strong> {{$educator->first_name}} {{$educator->last_name}}</p>

                    </a>

                </div>

                <div class="col-md-4">

                    @if($educator->active)

                        <form action="{{action('AdminEducatorController@deactivate', $educator->slug)}}" method="POST">

                            @method('PUT')
                            @csrf
                            <input class="btn btn-danger" type="submit" value="Deaktiviraj">

                        </form>

                    @else

                        <form action="{{action('AdminEducatorController@activate', $educator->slug)}}" method="POST">

                            @method('PUT')
                            @csrf
                            <input class="btn btn-success " type="submit" value="Aktiviraj">

                        </form>

                    @endif

                </div>

                <div class="col-md-4">

                    <form action="{{action('AdminEducatorController@destroy', $educator->slug)}}" method="POST">

                        @method('DELETE')
                        @csrf
                        <input class="btn btn-danger" type="submit" value="Obriši">

                    </form>

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
