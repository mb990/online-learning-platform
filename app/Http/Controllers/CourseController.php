<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Course;
use App\Category;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showAllWithCategories() {

        $courses = Course::whereHas('owner', function ($q) {
            $q->where('active', '=', true);
        })
            ->paginate(9);

        $recentCourses = Course::whereHas('owner', function ($q) {
            $q->where('active', '=', true);
        })
            ->take(3)
            ->latest()
            ->get();

        $categories = Category::all();

        return view('courses.show-courses')
            ->with('courses', $courses)
            ->with('categories', $categories)
            ->with('recentCourses', $recentCourses);
    }

    public function showSingle($slug)
    {
        $course = Course::where('slug', '=', $slug)
            ->first();
//        dd($course->toSql());

//        $owner = User::whereHas('createdCourses', function($q) use($id) {
//            $q->whereIn('courses.id', [$id]);
//            })
//            ->first();

        $goals = explode(' ', $course->goals);

        $category = Category::where('id', '=', $course->category_id)
            ->first();

//        $buyer = User::whereHas('followedCourses', function ($q) use($id) {
//           $q->where('course_id', '=', $id);
//        });

        $recommendedCourses = Course::whereHas('owner', function ($q) {
            $q->where('active', '=', true);
        })
            ->where('user_id', '=', $course->user_id)
            ->where('id', '!=', $course->id)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('courses.show-single')
            ->with('course', $course)
            ->with('category', $category)
            ->with('goals', $goals)
//            ->with('buyer', $buyer)
            ->with('recommendedCourses', $recommendedCourses);
    }

    public function showByCategory($category_name) {

        $category = Category::where('name', '=', $category_name)->first();

        $courses = Course::whereHas('owner', function ($q) {
            $q->where('active', '=', true);
        })
            ->where('category_id', '=', $category->id)
            ->get();

        return view('courses.show-by-category')
            ->with('courses', $courses)
            ->with('category', $category);
    }

    public function create()
    {
        $categories = Category::all();

        return view('courses.create-course')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->file('image_url'));

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'goals' => 'required',
            'video_url' => 'required',
            'category_id' => 'required',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $course = new Course();

        $course->name = $request->input('name');
        $course->user_id = auth()->user()->id;
        $course->description = $request->input('description');
        $course->goals = $request->input('goals');
        $course->video_url = $request->input('video_url');
        $course->category_id = $request->input('category_id');
        $course->image_url = 'temp';

        $course->save();

        $image = $request->file('image_url');

        Storage::disk('public')->putFileAs('course-images/', $image, $course->id . '.' . $image
        ->getClientOriginalExtension());

        $course->image_url = asset('storage/course-images/' . $course->id . '.' . $image->getClientOriginalExtension());
        $course->save();

        return redirect('/my-courses');
    }

    public function edit($slug)
    {

        $course = Course::where('slug', '=', $slug)->first();

        $categories = Category::all();

        return view('courses.edit-course')
            ->with('course', $course)
            ->with('categories', $categories);
    }

    public function update(Request $request, $slug)
    {

        $course = Course::where('slug', '=', $slug)->first();

        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->goals = $request->input('goals');
        $course->video_url = $request->input('video');
        $course->category_id = $request->input('category');
        $course->image_url = $request->input('image');


        $course->save();

        return redirect('/courses/' . $course->slug);
    }

    public function destroy($slug)
    {

        $course = Course::where('slug', '=', $slug);

        $course->delete();

        return redirect('/profiles/' . auth()->user()->slug);
    }
}
