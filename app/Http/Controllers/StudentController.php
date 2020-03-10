<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function followCourse($id) {

        $course = Course::find($id);

        $course->followers()->attach(auth()->user()->id);

        return redirect('/my-courses/' . auth()->user()->id);
    }

    public function unfollowCourse($id) {

        $course = Course::find($id);

        $course->followers()->detach(auth()->user()->id);

        return redirect('/my-courses/' . auth()->user()->id);
    }
}
