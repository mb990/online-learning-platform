<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Role;
use App\RoleUser;
use App\User;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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

//    public function showCourses() {
//
//        $courses = Course::all();
//
//        return view('courses')->with('courses', $courses);
//
//    }

    public function showEducators() {

        $educators = DB::table('role_users')
            ->select('*')
            ->join('profiles', 'profiles.user_id', '=', 'role_users.user_id')
            ->join('users', 'users.id', '=', 'role_users.user_id')
            ->join('roles', 'roles.id', '=', 'role_users.role_id')
            ->where('roles.name', '=', 'educator')
            ->get();
//        $educators = RoleUser::all()->where('role_id', '=', 3);

        return view('admins.show_educators')->with('educators', $educators);

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

        return view('admins.show_educator')->with('educator', $educator);
    }

    public function editEducator($id) {
        $educator = DB::table('role_users')
            ->select('*')
            ->join('profiles', 'profiles.user_id', '=', 'role_users.user_id')
            ->join('users', 'users.id', '=', 'role_users.user_id')
            ->join('roles', 'roles.id', '=', 'role_users.role_id')
            ->where('roles.name', '=', 'educator')
            ->where('role_users.user_id', '=', $id)
            ->get();

        return view('admins.edit_educator')->with('educator', $educator);
    }

    public function updateEducator($id) {

        $educator = DB::table('role_users')
            ->join('profiles', 'profiles.user_id', '=', 'role_users.user_id')
            ->join('users', 'users.id', '=', 'role_users.user_id')
            ->join('roles', 'roles.id', '=', 'role_users.role_id')
            ->where('roles.name', '=', 'educator')
            ->where('role_users.user_id', '=', $id)
//            ->first();
            ->update([
                'first_name' => request()->first_name,
                'last_name' => request()->last_name,
                'age' => request()->age,
                'linkedin' => request()->linkedin,
                'education' => request()->education,
                'image_url' => request()->image_url,
                'title' => request()->title,
                'biography' => request()->biography,
            ]);
//        $educator->first_name = $request->input('first_name');
//        $educator->last_name = $request->input('last_name');
//        $educator->age = $request->input('age');
//        $educator->linkedin = $request->input('linkedin');
//        $educator->education = $request->input('education');
//        $educator->image_url = $request->input('image_url');
//        $educator->title = $request->input('title');
//        $educator->biography = $request->input('biography');

//        $educator->save();

        return redirect('/admin/educators')->with('success', 'Educator is updated');
    }

    public function destroyEducator($id) {

        $educator = User::find($id);

        $educator->delete();

        return redirect('/admin/educators')->with('success', 'Educator is deleted.');
    }

    public function showStudents() {

        $students = DB::table('role_users')
            ->select('*')
            ->join('profiles', 'profiles.user_id', '=', 'role_users.user_id')
            ->join('users', 'users.id', '=', 'role_users.user_id')
            ->join('roles', 'roles.id', '=', 'role_users.role_id')
            ->where('roles.name', '=', 'student')->get();

        return view('admins.show_students')->with('students', $students);
    }

    public function showStudent($id) {

        $student = DB::table('role_users')
            ->select('*')
            ->join('profiles', 'profiles.user_id', '=', 'role_users.user_id')
            ->join('users', 'users.id', '=', 'role_users.user_id')
            ->join('roles', 'roles.id', '=', 'role_users.role_id')
            ->where('roles.name', '=', 'student')
            ->where('role_users.user_id', '=', $id)
            ->get();

        return view('admins.show_student')->with('student', $student);
    }

    public function editStudent($id) {

        $student = DB::table('role_users')
            ->select('*')
            ->join('profiles', 'profiles.user_id', '=', 'role_users.user_id')
            ->join('users', 'users.id', '=', 'role_users.user_id')
            ->join('roles', 'roles.id', '=', 'role_users.role_id')
            ->where('roles.name', '=', 'student')
            ->where('role_users.user_id', '=', $id)
            ->get();

        return view('admins.edit_student')->with('student', $student);
    }

    public function updateStudent($id) {

        $educator = DB::table('role_users')
            ->join('profiles', 'profiles.user_id', '=', 'role_users.user_id')
            ->join('users', 'users.id', '=', 'role_users.user_id')
            ->join('roles', 'roles.id', '=', 'role_users.role_id')
            ->where('roles.name', '=', 'student')
            ->where('role_users.user_id', '=', $id)
//            ->first();
            ->update([
                'first_name' => request()->first_name,
                'last_name' => request()->last_name,
                'age' => request()->age,
                'linkedin' => request()->linkedin,
                'education' => request()->education,
                'image_url' => request()->image_url,
                'title' => request()->title,
                'biography' => request()->biography,
            ]);

        return redirect('/admin/students')->with('success', 'Student is updated');
    }

    public function destroyStudent($id) {

        $student = User::find($id);

        $student->delete();

        return redirect('/admin/students')->with('success', 'Student is deleted.');
    }

    public function showALl() {

        $users = User::all();

        return view('admins.show_users', compact('users'));
    }

    public function showUser($id) {

        $user = User::with('profile')->find($id);

        $profile = Profile::select('*')
            ->where('user_id', '=', $id)
            ->get();

        return view('admins.show_user')
            ->with('user', $user)
            ->with('profile', $profile);
    }
}
