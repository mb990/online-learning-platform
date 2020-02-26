@extends('layout.app')
<?php $title = 'Show single educator'; ?>

@section('content')

    <h2>Profile for User {{$educator[0]->user_id}}</h2>

    <form action="{{action('AdminsController@showEducator', $educator[0]->user_id)}}" method="GET">
        @csrf
        <tr>
            <td>First name: {{$educator[0]->first_name}}</td><br>
            <td>Last name: {{$educator[0]->last_name}}</td><br>
            <td>Age: {{$educator[0]->age}}</td><br>
            <td>Linkedin: {{$educator[0]->linkedin}}</td><br>
            <td>Education: {{$educator[0]->education}}</td><br>
            <td>Image: {{$educator[0]->image_url}}</td><br>
            <td>Title: {{$educator[0]->title}}</td><br>
            <td>Biography: {{$educator[0]->biography}}</td><br>
        </tr>
    </form>

@endsection

</body>
</html>
