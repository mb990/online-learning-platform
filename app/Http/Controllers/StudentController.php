<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function followCourse($slug) {

        $course = Course::where('slug', '=', $slug)->first();

        $course->followers()->attach(auth()->user()->id);

        return redirect('/my-courses/');
    }

    public function unfollowCourse($slug) {

        $course = Course::where('slug', '=', $slug)->first();

        $course->followers()->detach(auth()->user()->id);

        return redirect('/my-courses/');
    }
}
