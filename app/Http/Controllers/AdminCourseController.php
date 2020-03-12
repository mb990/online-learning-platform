<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class AdminCourseController extends Controller
{
    public function index() {

        $courses = Course::withTrashed()
            ->paginate(10);

        return view('admin.courses')->with('courses', $courses);
    }

    public function deactivate($slug) {

        $course = Course::where('slug', '=', $slug)
            ->first();

        $course->active = false;
        $course->save();

        return redirect('/admin/courses');
    }

    public function activate($slug) {

        $course = Course::where('slug', '=', $slug)
            ->first();

        $course->active = true;
        $course->save();

        return redirect('/admin/courses');
    }

    public function destroy($slug) {

        $course = Course::where('slug', '=', $slug)
            ->first();

        $course->forceDelete();

        return redirect('/admin/courses');
    }

//    public function activate($slug) {
//
//        $course = Course::withTrashed()
//            ->where('slug', '=', $slug)
//            ->first();
//
//        $course->restore();
//
//        return redirect('/admin/courses');
//    }
}
