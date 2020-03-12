@extends('layouts.app')
@section('title')
    Svi korisnici
@endsection

@section('content')

    <div class="jumbotron">
        <h1 class="text-center"> Svi korisnici</h1>
    </div>

    @if(count($users))
        {{--    {{dd($educators)}}--}}
        @foreach ($users as $user)

            <div class="row text-center">

                <div class="col-md-4">

                    <p class="text-secondary"><strong>Ime:</strong> {{$user->first_name}}</p>
                    <p class="text-secondary"><strong>Prezime:</strong> {{$user->last_name}}</p>
                    {{--                            <p class="text-secondary"><strong>Role:</strong> {{$educator->roles[0]->name}}</p><br>--}}

                </div>

                <div class="col-md-4"><br>

                    @if($user->hasRole('educator'))
                        <a href="/admin/educators/{{$user->slug}}">View profile</a><br>
                    @else
                        <a href="/admin/students/{{$user->slug}}">View profile</a><br>
                    @endif

                </div>

            </div>

            <hr>

        @endforeach

    @else

        <p class="p-3 mb-2 bg-warning text-dark">Trenutno nema korisnika.</p>

    @endif

    <div class="row justify-content-center">

        {{$users->links()}}

    </div>

@endsection
