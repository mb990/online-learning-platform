@extends('layouts.app')

@section('title')
    Prikazi kurs
@endsection
{{--{{dd($course->boughtBy(auth()->user()->id))}}--}}
@section('content')

<br>
<div class="row text-center">

    <div class="col-md-12">

        <h1 class="text-uppercase">{{$course->name}}</h1>

    </div>

</div><br>
{{--{{dd($course->boughtBy(auth()->user()->id))}}--}}
{{--    @if(auth()->user()->boughtCourses->contains($course->id))--}}
{{--{{ dd($course->boughtBy(14)->toSql())  }}--}}

@auth

    @if(auth()->user()->hasRole('student') && !$course->followedBy(auth()->user()->id))

        <h2 class="text-center text-danger">Kupite ovaj kurs da vidite ceo sadrzaj</h2><br>

    @endif

@endauth

<div class="row text-center">

    @auth

        @if($course->followedBy(auth()->user()->id) || $course->owner->id === auth()->user()->id)

            <div class="col-md-5">

                <iframe width="400" height="200" src="{{$course->video_url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            </div>

        @endif

    @endauth

        <div class="col-md-7">

            <p class="lead">{{$course->description}}</p>

        </div>

    </div><br><br>

    <div class="row text-center">

        <div class="col-md-3">

            <img src="{{$course->owner->profile->image_url}}" width="150" height="150" alt="profile picture">
            <p class="lead">by {{$course->owner->first_name}} {{$course->owner->last_name}}</p>

        </div>

        <div class="col-md-9">

            <p class="lead">{{$course->owner->profile->biography}}</p>

        </div>

    </div>

    <div class="row">

        <h3>Sadrzaj kursa</h3>

        <ol class="connected list no2" style="width: 1000px; min-height:200px; border: 1px solid black">

        @auth

            @if($course->followedBy(auth()->user()->id) || $course->owner->id === auth()->user()->id)

                @if(count($course->contents))

                    @foreach($course->contents as $content)

                        <li>
                            {{$content->description}}
                        </li>

                    @endforeach

                @else

                    <li>
                        Ovaj kurs nema sadrzaj.
                    </li>

                @endif

        @endauth

            @else

                @if(count($course->contents))

                    <li>
                        {{$course->contents[0]->description}}
                    </li>

                    <li>
                        <strong>Kupite ovaj kurs da vidite ostatak.</strong>
                    </li>

                @else

                    <li>
                        Ovaj kurs nema sadrzaj.
                    </li>

                @endif

            @endif


        </ol>

    </div>

    <div class="row">

        <h3>Svi efekti kursa</h3>

        <ol class="connected list no2" style="width: 1000px; min-height: 200px; border: 1px solid black">

            @if(count($goals))

                @foreach($goals as $goal)

                    <li>
                        {{$goal}}
                    </li>

                @endforeach

        </ol>

            @else

                <li>
                    Ovaj kurs nema definisane ciljeve.
                </li>

            @endif
    </div>

    @auth

        @if($course->owner->id !== auth()->user()->id)

            <div class="row text-center">

                <div class="col-md-12">

                    <h2 class="text-primary">Preporuceni kursevi</h2>

                </div>

            </div>

            <div class="row justify-content-center text-center">

                @if(count($recommendedCourses))

                    @foreach ($recommendedCourses as $course)

                        <div class="col-md-4">

                            <a href="/courses/{{$course->id}}">
                                <img src="{{$course->image_url}}" width="150" height="150" alt="course_image"><br>
                                <p class="lead">{{$course->name}}</p>
                            </a>

                        </div>

                    @endforeach

                @else

                    <p class="p-3 mb-2 bg-warning text-dark">Trenutno nema preporucenih kurseva.</p>

                @endif

        @endif

        @endauth

    </div>

@endsection

</body>
</html>

