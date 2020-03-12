<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use App\User;
class PageController extends Controller
{
    // show 3 most popular courses
    public function index()
    {
        $courses = Course::whereHas('owner', function ($q) {
            $q->where('active', '=', true);
        })
            ->withCount('followers')
            ->latest('followers_count')
            ->take(3)
            ->get();

        return view('homepage')->with('courses', $courses);
    }

    public function admin() {

        return view('admin.index');
    }

    public function educators(Request $request) {

        $search = $request->get('search');

        $conditions = function ($query) use ($search){
            $query->where(function ($wheres) use ($search) {
            $wheres->where('first_name', 'like', '%' . $search . '%')
                   ->orWhere('last_name', 'like', '%' . $search . '%');
            });
        };

        $educators = User::whereHas('roles', function ($q) {
            $q->whereIn('name', ['educator']);
        })
            ->where($conditions)
            ->paginate(10);

        $recentEducators = User::whereHas('roles', function($q){
            $q->whereIn('name', ['educator']);
            })
            ->latest()
            ->take(3)
            ->get();

        return view('educators')
            ->with('recentEducators', $recentEducators)
            ->with('educators', $educators);
    }

    public function showEducator($slug) {

        $user = User::where('slug', '=', $slug)->first();

        return view('educator')->with('user', $user);
    }

    public function myCourses() {

        $educatorCourses = Course::whereHas('owner', function ($q) {
            $q->where('active', '=', true);
        })
            ->with('owner')
            ->where('user_id', '=', auth()->user()->id)
            ->get();

        $studentCourses = Course::whereHas('followers', function ($q) {
                $q->where('users.id', '=', auth()->user()->id);
            })
            ->whereHas('owner', function ($q) {
                $q->where('active', '=', true);
            })
            ->get();

        return view('my-courses')
            ->with('educatorCourses', $educatorCourses)
            ->with('studentCourses', $studentCourses);
    }
}
