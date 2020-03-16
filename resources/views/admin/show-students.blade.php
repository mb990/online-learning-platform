@extends('layouts.app')
@section('title')
    Polaznici
@endsection

@section('content')

    <div class="jumbotron">
        <h1 class="text-center">Polaznici</h1>
    </div>

    @if(count($students))

        @foreach ($students as $student)

            <div class="row text-center">

                <div class="col-md-4">

                    <a href="/admin/educators/{{$student->slug}}">

                        <p class="text-secondary"><strong>Polaznik:</strong> {{$student->first_name}} {{$student->last_name}}</p>

                    </a>

                </div>

                <div class="col-md-4">

                    @if($student->active)

                        <form action="{{action('AdminStudentController@deactivate', $student->slug)}}" method="POST">

                            @method('PUT')
                            @csrf
                            <input class="btn btn-danger" type="submit" value="Deaktiviraj">

                        </form>

                    @else

                        <form action="{{action('AdminStudentController@activate', $student->slug)}}" method="POST">

                            @method('PUT')
                            @csrf
                            <input class="btn btn-success " type="submit" value="Aktiviraj">

                        </form>

                    @endif

                </div>

                <div class="col-md-4">

                    <form action="{{action('AdminEducatorController@destroy', $student->slug)}}" method="POST">

                        @method('DELETE')
                        @csrf
                        <input class="btn btn-danger" type="submit" value="Obriši">

                    </form>

                </div>

            </div>

            <hr>

        @endforeach

    @else

        <p class="p-3 mb-2 bg-warning text-dark">Trenutno nema polaznika.</p>

    @endif

    <div class="row justify-content-center">

        {{$students->links()}}

    </div>

@endsection
