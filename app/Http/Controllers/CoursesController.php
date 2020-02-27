<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Profile;
use App\Role;
use App\Category;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $course = new Course;

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
    public function showSingle($id)
    {
        $course = Course::find($id);

        $category = DB::table('categories')
            ->where('id', '=', $course->category_id)
            ->first();

        return view('courses.show_single')
            ->with('course', $course)
            ->with('category', $category);
    }

    public function showPopularCourses() {

//        $courses = DB::table('courses')
//            ->join('course_users', 'course_users.course_id', '=', 'courses.id')
//            ->join('profiles', 'profiles.user_id', '=', 'course_users.user_id')
//            ->join('role_users', 'role_users.id', '=', 'course_users.user_id')
//            ->join('roles', 'roles.id', '=', 'role_users.role_id')
//            ->where('roles.name', '=', 'student')
//            ->limit(3)
//            ->get();

        $courses = DB::table('course_users')
            ->select(DB::raw('count(course_users.user_id) as count, courses.name, courses.video_url'))
            ->join('courses', 'courses.id', '=', 'course_users.course_id')
//            ->join('role_users', 'role_users.id', '=', 'course_users.user_id')
//            ->join('roles', 'roles.id', '=', 'role_users.role_id')
//            ->where('roles.name', '=', 'student')
            ->groupBy('courses.name')
            ->groupBy('courses.video_url') // ovde ce biti thumbnail
            ->orderBy('count', 'DESC')
            ->limit(3)
            ->get();

        return view('homepage')->with('courses', $courses);
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
