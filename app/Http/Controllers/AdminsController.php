<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Role;
use App\RoleUser;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use function foo\func;

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

        $educators = User::whereHas('roles', function($q){
            $q->whereIn('name', ['educator']);
            })
            ->get();

        return view('admins.show_educators')->with('educators', $educators);
    }

    public function showEducator($id) {

        $educator = User::find($id);

        return view('admins.show_educator')->with('educator', $educator);
    }

    public function editEducator($id) {

        $educator = User::find($id);

        return view('admins.edit_educator')->with('educator', $educator);
    }

    public function updateEducator(Request $request, $id) {

        $educator = User::find($id);

        $educator->first_name = $request->input('first_name');
        $educator->last_name = $request->input('last_name');
        $educator->email = $request->input('email');
        $educator->password = $request->input('password');
        $educator->profile->age = $request->input('age');
        $educator->profile->image_url = $request->input('image_url');
        $educator->profile->title = $request->input('title');
        $educator->profile->biography = $request->input('biography');
        $educator->profile->education = $request->input('education');
        $educator->profile->linkedin = $request->input('linkedin');

        $educator->save();

        return redirect('/admin/educators/' . $id . '/view')
            ->with('$educator', $educator);

        return redirect('/admin/educators')->with('success', 'Educator is updated');
    }

    public function destroyEducator($id) {

        $educator = User::find($id);

        $educator->delete();

        return redirect('/admin/educators')->with('success', 'Educator is deleted.');
    }

    public function showStudents() {

        $students = User::whereHas('roles', function($q){
            $q->whereIn('name', ['student']);
        })
            ->get();

        return view('admins.show_students')->with('students', $students);
    }

    public function showStudent($id) {

        $student = User::find($id);

        return view('admins.show_student')->with('student', $student);
    }

    public function editStudent($id) {

        $student = User::find($id);

        return view('admins.edit_student')->with('student', $student);
    }

    public function updateStudent(Request $request, $id) {

        $student = User::find($id);

        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->email = $request->input('email');
        $student->password = $request->input('password');
        $student->profile->age = $request->input('age');
        $student->profile->image_url = $request->input('image_url');
        $student->profile->title = $request->input('title');
        $student->profile->biography = $request->input('biography');
        $student->profile->education = $request->input('education');
        $student->profile->linkedin = $request->input('linkedin');

        $student->save();
        $student->profile->save();

        return redirect('/admin/students/' . $id . '/view')
            ->with('student', $student);
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

        return view('admins.show_user')
            ->with('user', $user);
    }
}
