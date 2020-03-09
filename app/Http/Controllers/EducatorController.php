<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class EducatorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_EDUCATOR');
    }

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

    public function edit($id) {

        $course = Course::find($id);

        return view('courses.edit-course')
            ->with('user', $course);
    }

    public function update(Request $request, $id) {

        $course = User::find($id);

        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->goals = $request->input('goals');
        $course->video_url = $request->input('video');
        $course->category_id = $request->input('category');
        $course->image_url = $request->input('image');


        $course->save();

        return redirect('/courses/' . $course->id . '/');
    }
}
