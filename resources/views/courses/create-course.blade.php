@extends('layouts.app')
@section('title')
    Kreiraj kurs
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading text-center">

                    <h3 class="text-info">Novi kurs</h3>

                </div><br>

                <div class="panel-body">

                    <form action="{{action('CourseController@store')}}" enctype="multipart/form-data" method="POST" xmlns="http://www.w3.org/1999/html">
                        @csrf
                        <label for="course_name">Ime kursa</label>
                        <input class="form-control" name="name" type="text" id="name" placeholder="Ime kursa"><br>

                        <label for="description">Opis kursa</label>
                        <textarea class="form-control" name="description" id="description" placeholder="Opis kursa"></textarea><br>

                        <label for="goals">Ciljevi</label>
                        <input class="form-control" name="goals" type="text" id="goals" placeholder="Ciljevi kursa"><br>

                        <label for="video_url">Video</label>
                        <input type="file" class="form-control-file" name="video_url" id="video_url"><br>

                        <label for="image_url">Slika</label>
                        <input type="file" class="form-control-file" name="image_url" id="image_url"><br>

                        <label for="category">Kategorija</label>
                        <select class="form-control" name="category_id">
                            <option style="display: none" disabled selected value> -- izaberi kategoriju -- </option>
                            <?php foreach ($categories as $category) { ?>
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            <?php } ?>
                        </select><br>

                        <button class="btn btn-primary" type="submit">Potvrdi</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
