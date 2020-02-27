@extends('layout.app')
<?php $title = 'Show educators'; ?>

@section('content')

    <h2>All educators:</h2>

    @foreach ($educators as $educator)

        <tr>
            <td>First name: {{$educator->first_name}}</td><br>
            <td>Last name: {{$educator->last_name}}</td><br>
            <td><a href="/admin/educators/{{$educator->user_id}}/view">View profile</a></td><br>
            <td><a href="/admin/educators/{{$educator->user_id}}/edit">Edit profile</a></td>
        </tr>
            <form action="{{action('AdminsController@destroyEducator', $educator->user_id)}}" method="POST">
    {{--            {{ method_field('DELETE') }}--}}
    {{--            {{ csrf_field() }}--}}
                @method('DELETE')
                @csrf
                <input type="submit" value="Delete user">

            </form>
    @endforeach

@endsection
</body>
</html>
