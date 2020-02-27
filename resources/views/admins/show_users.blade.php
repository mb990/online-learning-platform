@extends('layout.app')
<?php $title = 'Show all users'; ?>

@section('content')

    <h2>All users:</h2>

    @foreach ($users as $user)

        <tr>
            <td>First name: {{$user->first_name}}</td><br>
            <td>Last name: {{$user->last_name}}</td><br>
            <td>Role: {{$user->role}}</td><br>
            <td><a href="/admin/users/{{$user->id}}/view">View profile</a></td><br>
            {{--            {{ method_field('DELETE') }}--}}
            {{--            {{ csrf_field() }}--}}
            @method('DELETE')
            @csrf
            <input type="submit" value="Delete user">
        </tr>
    @endforeach

@endsection
</body>
</html>
