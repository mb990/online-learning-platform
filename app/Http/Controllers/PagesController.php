<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class PagesController extends Controller
{
    public function index() {
        return view('homepage');
    }

    public function admin() {

        return view('admins.index');
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
            ->get();

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

        return view('show_educator')->with('educator', $educator);
    }

    public function dashboard() {

        return view('dashboard');
    }
}
