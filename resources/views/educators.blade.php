@extends('layouts.app')

@section('title')
    Predavači
@endsection

@section('content')

    <h2 class="text-center">Najnoviji</h2><br>

<div class="row text-center">

    @foreach ($recentEducators as $recentEducator)

        <div class="col-md-4">

            <a href="/educators/{{$recentEducator->slug}}">

                @if(!$recentEducator->profile->image_url)

                    <img src="{{asset('storage/profile-images/default.png')}}" width="150" height="150" alt="profile picture">

                @else

                    <img src="{{$recentEducator->profile->image_url}}" width="150" height="150" alt="profile picture">

                @endif

                <p class="text-secondary"> {{ucfirst($recentEducator->first_name)}} {{ucfirst($recentEducator->last_name)}}</p>

            </a>

        </div>

    @endforeach

</div><br><br>

    <div class="row text-center justify-content-center">

        <form action='{{action('PageController@educators')}}' method="get">

            <input class="form-control" type="search" name="search"><br>
            <button class="btn btn-info" type="submit">Pretraga</button>

        </form>

    </div><br>

<div class="jumbotron">
    <h1 class="text-center">Predavači</h1>
</div>

<div class="row text-center">

    @if(count($educators))

        @foreach ($educators as $educator)

            <div class="col-md-3">

                <a href="/educators/{{$educator->slug}}">

                    @if(!$educator->profile->image_url)

                        <img src="{{asset('storage/profile-images/default.png')}}" width="150" height="150" alt="profile picture">

                    @else

                        <img src="{{$educator->profile->image_url}}" width="150" height="150" alt="profile picture">

                    @endif

                    <p class="text-secondary"> {{ucfirst($educator->first_name)}} {{ucfirst($educator->last_name)}}</p>

                </a>

            </div>

        @endforeach

</div>

@else

    <p class="p-3 mb-2 bg-warning text-dark">Trenutno nema predavača.</p>

@endif

<div class="row justify-content-center">

    {{$educators->links()}}

</div><br>

@endsection
