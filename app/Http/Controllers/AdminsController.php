<?php

namespace App\Http\Controllers;

use App\Role;
use App\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//    public function __construct()
//    {
//        $this->middleware('auth:admin')->except(['showCourses', 'showEducators', 'showStudents', 'showCategories']);
//    }

    public function showCourses() {

        $courses = Course::all()->get();

        return view('courses')->with('courses', $courses);

    }

    public function showEducators() {

        $educators = DB::table('role_users')
            ->select('*')
            ->join('profiles', 'profiles.user_id', '=', 'role_users.user_id')
            ->join('users', 'users.id', '=', 'role_users.user_id')
            ->join('roles', 'roles.id', '=', 'role_users.role_id')
            ->where('role_id', '=', 3)->get();
//        $educators = RoleUser::all()->where('role_id', '=', 3);

        return view('admins.show_educators')->with('educators', $educators);

    }

    public function editEducator($id) {

//        $educator = DB::table('role_users')->where('user_id', $id)->get();
//        $educator = RoleUser::all()->where('role_id', '=', $id);

        $educator = DB::table('role_users')
            ->select('*')
            ->join('profiles', 'profiles.user_id', '=', 'role_users.user_id')
            ->join('users', 'users.id', '=', 'role_users.user_id')
            ->join('roles', 'roles.id', '=', 'role_users.role_id')
            ->where('role_id', '=', 3)->get();

        return view('admins.edit_educator')->with('educator', $educator);

    }

}
