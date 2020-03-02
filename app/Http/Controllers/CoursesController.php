<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Category;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // show 3 most popular courses
    public function index()
    {
        $courses = Course::with('users')
            ->withCount('users')
            ->latest('users_count')
            ->take(3)
            ->get();

//        $count = User::whereHas('courses', function ($q) {
//            $q->count('user_id');
//            })
//            ->get();

        return view('homepage')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

       return view('courses.create_course')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'goals' => 'required',
            'video_url' => 'required',
            'category_id' => 'required'
        ]);

        $course = new Course();

        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->goals = $request->input('goals');
        $course->video_url = $request->input('video_url');
        $course->category_id = $request->input('category_id');

        $course->save();

        return redirect('courses.show_courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showAllWithCategories() {

        $courses = Course::all();

        $recentCourses = Course::take(3)
            ->latest()
            ->get();

        $categories = Category::all();

        return view('courses.show_courses')
            ->with('courses', $courses)
            ->with('categories', $categories)
            ->with('recentCourses', $recentCourses);
    }

    public function showSingle($id)
    {
        $course = Course::find($id);

        return view('courses.show_single')
            ->with('course', $course);
    }

    public function showByCategory($id) {

        $courses = Course::where('category_id', '=', $id)
            ->get();

        return view('courses.show_by_category')->with('courses', $courses);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
