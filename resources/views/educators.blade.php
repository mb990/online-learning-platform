@extends('layouts.app')

@section('title')
    Educators
@endsection

@section('content')

    <h2>Recently joined</h2>

<div class="row text-center">

    @foreach ($recentEducators as $recentEducator)

        <div class="col-md-4">

            @if(!$recentEducator->profile->image_url)

                <img src="https://previews.123rf.com/images/pikepicture/pikepicture1612/pikepicture161200526/68824651-male-default-placeholder-avatar-profile-gray-picture-isolated-on-white-background-for-your-design-ve.jpg" width="150" height="150" alt="profile picture">

            @else

                <img src="{{$recentEducator->profile->image_url}}" width="150" height="150" alt="profile picture">

            @endif

            <p class="text-secondary"> {{$recentEducator->first_name}} {{$recentEducator->last_name}}</p>

        </div>

    @endforeach

</div><br><br>

    <div class="row text-center justify-content-center">

        <form action='{{action('PagesController@educators')}}' method="get">

            <input class="form-control" type="search" name="search"><br>
            <button class="btn btn-info" type="submit">Search</button>

        </form>

    </div><br>

<div class="jumbotron">
    <h1 class="text-center">Educators</h1>
</div>

<div class="row text-center">

    @if(count($educators))

        @foreach ($educators as $educator)

            <div class="col-md-3">

                @if(!$educator->profile->image_url)

                    <img src="https://previews.123rf.com/images/pikepicture/pikepicture1612/pikepicture161200526/68824651-male-default-placeholder-avatar-profile-gray-picture-isolated-on-white-background-for-your-design-ve.jpg" width="150" height="150" alt="profile picture">

                @else

                    <img src="{{$educator->profile->image_url}}" width="150" height="150" alt="profile picture">

                @endif

                    <p class="text-secondary"> {{$educator->first_name}} {{$educator->last_name}}</p>

            </div>

        @endforeach

</div>

@else

    <p>No educators to show.</p>

@endif

<div class="row justify-content-center">

    {{$educators->links()}}

</div><br>

@endsection
