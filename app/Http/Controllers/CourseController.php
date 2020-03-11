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

//        $courses = Course::whereHas('owner', function ($q) {
//            $q->where('deleted_at', '=', null);
//        })
//            ->paginate(9);

        $courses = Course::has('owner')
            ->paginate(9);

        $recentCourses = Course::has('owner')
            ->take(3)
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

        $buyer = User::whereHas('followedCourses', function ($q) use($id) {
           $q->where('course_id', '=', $id);
        });

        $recommendedCourses = Course::where('user_id', '=', $course->user_id)
            ->where('id', '!=', $course->id)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('courses.show-single')
            ->with('course', $course)
            ->with('category', $category)
            ->with('goals', $goals)
            ->with('buyer', $buyer)
            ->with('recommendedCourses', $recommendedCourses);
    }

    public function showByCategory($category_name) {

        $category = Category::where('name', '=', $category_name)->first();

        $courses = Course::has('owner')
            ->where('category_id', '=', $category->id)
            ->get();

        return view('courses.show-by-category')
            ->with('courses', $courses)
            ->with('category', $category);
    }
}
