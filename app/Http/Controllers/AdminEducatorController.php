<?php

namespace App\Http\Controllers;

use App\Course;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminEducatorController extends Controller
{

    public function showAll() {

        $educators = User::whereHas('roles', function($q){
            $q->whereIn('name', ['educator']);
        })
            ->paginate(10);

        return view('admin.show-educators')->with('educators', $educators);
    }

    public function showSingle($slug) {

        $educator = User::where('slug', '=', $slug)
            ->first();

        return view('admin.show-educator')->with('educator', $educator);
    }

    public function edit($id) {

        $educator = User::find($id);
        $roles = Role::all();

        return view('admin.edit-educator')
            ->with('educator', $educator)
            ->with('roles', $roles);
    }

    public function update(Request $request, $id) {

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
        $educator->roles()->sync([$request->input('role')]);

        $educator->save();
        $educator->profile->save();

        return redirect('/admin/educators/')
            ->with('$educator', $educator);

        return redirect('/admin/educators');
    }

    public function deactivate($slug) {

        $educator = User::where('slug', '=', $slug)
            ->first();

        $educator->active = false;
        $educator->save();

        return redirect('/admin/educators');
    }

    public function activate($slug) {

        $educator = User::where('slug', '=', $slug)
            ->first();

        $educator->active = true;
        $educator->save();

        return redirect('/admin/educators');
    }

    public function destroy($slug) {

        $educator = User::where('slug', '=', $slug)
             ->first();

        $educator->forceDelete();

        return redirect('/admin/educators')->with('success', 'Educator is deleted.');
    }
}
