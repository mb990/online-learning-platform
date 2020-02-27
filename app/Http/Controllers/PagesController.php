<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index() {
        return view('homepage');
    }

    public function admin() {

        return view('admins.index');
    }

    public function educators() {

        $recentEducators = DB::table('role_users')
            ->select('*')
            ->join('profiles', 'profiles.user_id', '=', 'role_users.user_id')
            ->join('users', 'users.id', '=', 'role_users.user_id')
            ->join('roles', 'roles.id', '=', 'role_users.role_id')
            ->where('roles.name', '=', 'educator')
            ->latest('users.created_at')
            ->limit(3)
            ->get();

        return view('educators')->with('recentEducators', $recentEducators);
    }

    public function showEducator($id) {

        $educator = DB::table('role_users')
            ->select('*')
            ->join('profiles', 'profiles.user_id', '=', 'role_users.user_id')
            ->join('users', 'users.id', '=', 'role_users.user_id')
            ->join('roles', 'roles.id', '=', 'role_users.role_id')
            ->where('roles.name', '=', 'educator')
            ->where('role_users.user_id', '=', $id)
            ->get();

        return view('show_educator')->with('educator', $educator);
    }
}
