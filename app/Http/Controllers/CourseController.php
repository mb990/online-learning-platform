<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Course;
use App\Category;
use Illuminate\Support\Facades\DB;
use function foo\func;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showAllWithCategories() {

        $courses = Course::paginate(9);

        $recentCourses = Course::take(3)
            ->latest()
            ->get();

        $categories = Category::all();

        return view('courses.show-courses')
            ->with('courses', $courses)
            ->with('categories', $categories)
            ->with('recentCourses', $recentCourses);
    }

    public function showSingle($id)
    {
        $course = Course::find($id);

//        $owner = User::whereHas('createdCourses', function($q) use($id) {
//            $q->whereIn('courses.id', [$id]);
//            })
//            ->first();

        $goals = explode(' ', $course->goals);

        $category = Category::where('id', '=', $course->category_id)->first();

        $buyer = User::whereHas('boughtCourses', function ($q) use($id) {
           $q->where('course_id', '=', $id);
        });

        return view('courses.show-single')
            ->with('course', $course)
            ->with('category', $category)
            ->with('goals', $goals)
            ->with('buyer', $buyer);
    }

    public function showByCategory($category_name) {

        $category = Category::where('name', '=', $category_name)->first();

        $courses = Course::where('category_id', '=', $category->id)
            ->get();

        return view('courses.show-by-category')
            ->with('courses', $courses)
            ->with('category', $category);
    }
}