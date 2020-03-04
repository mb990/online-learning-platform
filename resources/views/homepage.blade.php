@extends('layouts.app')
<?php $title = 'Homepage'; ?>
@section('content')

    <div class="row text-center">

        <div class="col-md-6">

            <img src="http://vle.stgabriels.co.uk/pluginfile.php/5018/coursecat/description/lion.png" alt="educators">

            <h2 class="text-secondary"><strong>Želiš da postaviš svoj kurs?</strong></h2><br>

            <h4><a href="/register/educator ">Prijavi se</a></h4>

        </div>

        <div class="col-md-6">

            <img src="https://rctmoodle.org/esisict/file.php/3/FP/games_kids.png" alt="students">

            <h2 class="text-secondary"><strong>Želiš da pohadjaš neki od kurseva?</strong></h2><br>

            <h4><a href="/register/student">Prijavi se</a></h4>

        </div>

    </div> <br><br><br>

    <div class="row text-center">

        <div class="col-md-6 offset-3">

            <h2>Ključne vrednosti platforme</h2>

        </div>

    </div><br><br><br>

    <div class="row text-center">

        <div class="col-md-4">

            <img src="https://blogs.plos.org/dnascience/files/2018/11/256px-SMirC-coffeebreak.svg_.png" alt="website_description">
            <p class="lead">Učite iz komfora svog doma</p>

        </div>

        <div class="col-md-4">

            <img src="https://blogs.plos.org/dnascience/files/2018/11/256px-SMirC-coffeebreak.svg_.png" alt="website_description">
            <p class="lead">Nadjite najpovoljniji i najkvalitetniji kurs</p>

        </div>

        <div class="col-md-4">

            <img src="https://blogs.plos.org/dnascience/files/2018/11/256px-SMirC-coffeebreak.svg_.png" alt="website_description">
            <p class="lead">Sami odredite vreme i tempo pohadjanja kursa</p>

        </div>

    </div><br><br><br>


    <div class="row text-center">

        <div class="col-md-6 offset-3">

            <h2>Popularni kursevi</h2>

        </div>

    </div><br><br>

    <div class="row text-center">

        @foreach($courses as $course)

            <div class="col-md-4">

                <a href="/courses/{{$course->id}}/view">

                    <img src="https://cdn.iconscout.com/icon/premium/png-256-thumb/video-course-536883.png" alt="course_image"><br>
                    <p class="lead"><strong>Course name:</strong> {{$course->name}}</p>

                </a>

            </div>

        @endforeach

    </div>
<hr>

    <div class="row">

        <div class="col-md-12">

        <h4>About us</h4>

        </div>

    </div><br>

    <div class="row">

        <div class="col-md-12">

            <h4>Terms</h4>

        </div>

    </div><br>

    <div class="row">

        <div class="col-md-6">

            <h4>Privacy Policy</h4>

        </div>

        <div class="col-md-6">

            <h4 class="float-right">Contact Us</h4>

        </div>

    </div><br><br><br>

@endsection
