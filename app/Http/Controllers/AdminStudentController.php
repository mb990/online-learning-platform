<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminStudentController extends Controller
{

    public function showAll() {

        $students = User::whereHas('roles', function($q){
            $q->whereIn('name', ['student']);
        })
            ->paginate(10);

        return view('admin.show-students')->with('students', $students);
    }

    public function showSingle($slug) {

        $student = User::where('slug', '=', $slug)
            ->first();

        return view('admin.show-student')->with('student', $student);
    }

    public function edit($slug) {

        $student = User::where('slug', '=', $slug)
            ->first();
        $roles = Role::all();

        return view('admin.edit-student')
            ->with('student', $student)
            ->with('roles', $roles);
    }

    public function update(Request $request, $slug) {

        $student = User::where('slug', '=', $slug)
            ->first();

        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->email = $request->input('email');
        $student->password = $request->input('password');
//        $student->profile->age = $request->input('age');
//        $student->profile->image_url = $request->input('image_url');
//        $student->profile->title = $request->input('title');
//        $student->profile->biography = $request->input('biography');
//        $student->profile->education = $request->input('education');
//        $student->profile->linkedin = $request->input('linkedin');
        $student->roles()->sync([$request->input('role')]);

        $student->save();
        $student->profile->save();

        return redirect('/admin/students/')
            ->with('student', $student);
    }

    public function destroy($slug) {

        $student = User::where('slug', '=', $slug)
            ->first();

        $student->delete();

        return redirect('/admin/students')->with('success', 'Student is deleted.');
    }
}
