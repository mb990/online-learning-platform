<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Course;
use App\Category;
use Illuminate\Support\Facades\DB;
use function foo\func;

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
        $courses = Course::with('owner')
            ->withCount('buyers')
            ->latest('buyers_count')
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

       return view('courses.create-course')->with('categories', $categories);
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

        return redirect('courses.show-courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);

        $categories = Category::all();

        return view('courses.edit-course')
            ->with('course', $course)
            ->with('categories', $categories);
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
        $course = Course::find($id);

        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->goals = $request->input('goals');
        $course->video_url = $request->input('video_url');
        $course->category_id = $request->input('category_id');

        $course->save();

        return redirect('/courses/' . $course->id . '/view');
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
