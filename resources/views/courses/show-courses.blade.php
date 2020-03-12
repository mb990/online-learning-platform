@extends('layouts.app')
@section('title')
    Kursevi
@endsection
<style>

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

</style>


@section('content')
{{--    {{dd($courses)}}--}}

    <div class="jumbotron">
        <h1 class="text-center">Kursevi</h1>
    </div>

    <div class="row justify-content-center">

        <h2 class="text-primary">Najnoviji kursevi</h2>

    </div><br><br><br>

    @if(count($recentCourses))

        <div class="row">

            @foreach($recentCourses as $recentCourse)

                @if($recentCourse->owner->active)

                    <div class="col-md-4 text-center">

                        <a href="/courses/{{$recentCourse->slug}}">
                            <img src="{{$recentCourse->image_url}}" width="150" height="150" alt="course_image"><br>
                            <p class="lead">{{$recentCourse->name}}</p>
                        </a>

                        @auth

                            @if(auth()->user()->hasRole('student') && !$recentCourse->followedBy(auth()->user()->id))

                                <form action="{{action('StudentController@followCourse', $recentCourse->id)}}" method="POST">
                                    @csrf
                                    <input class="form-control" type="submit" value="Prijavi se">

                                </form>

                            @elseif(auth()->user()->hasRole('student') && $recentCourse->followedBy(auth()->user()->id))

                                <form action="{{action('StudentController@unfollowCourse', $recentCourse->id)}}" method="POST">

                                    @method('DELETE')
                                    @csrf
                                    <input class="form-control-odjava" type="submit" value="Odjavi se">

                                </form>

                            @endif

                        @endauth

                    </div>

                @endif

            @endforeach

    @else

        <div class="offset-4 col-md-4 text-center">

            <p class="p-3 mb-2 bg-warning text-dark">Trenutno nema kurseva</p>

        </div>

    @endif

        </div><br><br>

        <div class="row justify-content-center">

            <h2 class="text-primary">Svi kursevi</h2>

        </div><br><br><br>

            <div class="row text-center">

                <div class="col-md-3">

                    <table style="min-width: 200px;">

                        @foreach($categories as $category)

                            <tr>

                                <td><a href="/category/{{$category->slug}}">{{ ucfirst($category->name) }}</a></td>

                            </tr>

                        @endforeach

                    </table>

                </div>

                <div class="col-md-9">

                    <div class="row">

                        @if(count($courses))

                            @foreach ($courses as $course)

                                @if($course->owner->active)

                                    <div class="col-md-4">

                                        <a href="/courses/{{$course->slug}}">
                                            <img src="{{$course->image_url}}" width="150" height="150" alt="course_image"><br>
                                            <p class="lead">{{$course->name}}</p>
                                        </a>

                                        @auth

                                            @if(auth()->user()->hasRole('student') && !$course->followedBy(auth()->user()->id))

                                                <form action="{{action('StudentController@followCourse', $course->slug)}}" method="POST">

                                                    @csrf
                                                    <input class="form-control" type="submit" value="Prijavi se">

                                                </form>

                                            @elseif(auth()->user()->hasRole('student') && $course->followedBy(auth()->user()->id))

                                                <form action="{{action('StudentController@unfollowCourse', $course->slug)}}" method="POST">

                                                    @method('DELETE')
                                                    @csrf
                                                    <input class="form-control-odjava" type="submit" value="Odjavi se">

                                                </form>

                                            @endif

                                        @endauth

                                    </div>

                                @endif

                            @endforeach

                        @else

                            <div class="offset-2 col-md-3">

                                <p class="p-3 mb-2 bg-warning text-dark">Trenutno nema kurseva.</p>

                            </div>

                        @endif

                    </div>

                </div>

            </div>

    <div class="row justify-content-center">

        {{ $courses->links() }}

    </div>

@endsection
