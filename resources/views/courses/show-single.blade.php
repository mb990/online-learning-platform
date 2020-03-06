@extends('layouts.app')

@section('title')
    Show single course
@endsection

@section('content')

<br>
<div class="row">

    <h1>{{$course->name}}</h1>

</div><br>

{{--{{dd($course->boughtBy(auth()->user()->id))}}--}}

{{--    @if(auth()->user()->boughtCourses->contains($course->id))--}}
{{--{{ dd($course->boughtBy(14)->toSql())  }}--}}
    <div class="row text-center">

        @if($course->boughtBy(auth()->user()->id))

            <div class="col-md-5">

                <iframe width="400" height="200" src="{{$course->video_url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            </div>

        @endif

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

        <h3>Table of content</h3>

        <ol class="connected list no2" style="width: 1000px; min-height:200px; border: 1px solid black">

            @if($course->boughtBy(auth()->user()->id))

                @if(count($course->contents))

                    @foreach($course->contents as $content)

                        <li>
                            {{$content->description}}
                        </li>

                    @endforeach

                @endif

                @else

                    <li>
                        {{$course->contents[0]->description}}
                    </li>

                    <li>
                        <strong>Buy this course to see the rest.</strong>
                    </li>

                @if(!count($course->contents))

                    <li>
                        No content for this course.
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
                    No goals for this course.
                </li>

            @endif
    </div>

@endsection

</body>
</html>

