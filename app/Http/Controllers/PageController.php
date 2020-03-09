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
        $courses = Course::with('owner')
            ->withCount('buyers')
            ->latest('buyers_count')
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

    public function showEducator($id) {

        $educator = User::find($id);

        return view('show-educator')->with('educator', $educator);
    }

    public function dashboard() {

        return view('dashboard');
    }
}
