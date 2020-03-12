@extends('layouts.app')
@section('title')
    Studenti
@endsection

@section('content')

    <div class="jumbotron">
        <h1 class="text-center">Studenti</h1>
    </div>

    @if(count($students))
        {{--    {{dd($educators)}}--}}
        @foreach ($students as $student)

            <div class="row text-center">

                <div class="col-md-4">

                    <p class="text-secondary"><strong>Ime:</strong> {{$student->first_name}}</p>
                    <p class="text-secondary"><strong>Prezime:</strong> {{$student->last_name}}</p>
                    {{--                            <p class="text-secondary"><strong>Role:</strong> {{$educator->roles[0]->name}}</p><br>--}}


                </div>

                <div class="col-md-4"><br>

                    <a href="/admin/students/{{$student->slug}}">Profil</a><br>
{{--                    <a href="/admin/students/{{$student->id}}/edit">Edit profile</a><br><br>--}}


                </div>

                <div class="col-md-4">
                    <form action="{{action('AdminStudentController@destroy', $student->slug)}}" method="POST">

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

        {{$students->links()}}

    </div>

@endsection
