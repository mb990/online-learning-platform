@extends('layouts.app')
@section('title')
    Izmeni kurs
@endsection

@section('content')

    @if($course->user_id !== auth()->user()->id)

        <div class="row justify-content-center">

            <div class="col-md-6">

                <img width="400" height="400" src="https://images.8tracks.com/cover/i/000/104/534/3973376_700b-5093.jpg?rect=67,0,565,565&q=98&fm=jpg&fit=max" alt="">

            </div>

        </div>

{{--    @php--}}
{{--    --}}
{{--    header('Location: /profiles/' . );--}}

{{--    @endphp--}}
    @else

        <div class="row justify-content-center">
            <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">

                        <h3 class="text-info">Izmeni kurs</h3>

                    </div>

                    <div class="panel-body">

                        <form action="{{action('EducatorController@update', $course->slug)}}" method="POST" xmlns="http://www.w3.org/1999/html">
                            @csrf
                            @method('PUT')
                            <label for="course_name">Ime kursa</label>
                            <input class="form-control" name="name" type="text" id="name" value="{{$course->name}}"><br>

                            <label for="description">Opis kursa</label>
                            <textarea class="form-control" name="description" id="description" placeholder="Course description">{{$course->description}}</textarea><br>

                            <label for="goals">Ciljevi kursa</label>
                            <input class="form-control" name="goals" type="text" id="goals" value="{{$course->goals}}"><br>

                            <label for="video_url">Video</label>
                            <input class="form-control" name="video_url" type="url" id="video_url" value="{{$course->video_url}}"><br>

                            <label for="category">Kategorija</label>
                            <select class="form-control" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select><br>

                            <button class="btn btn-primary center-block" type="submit">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    @endif

    @endsection
