<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function editProfile($id) {

        $user = User::find($id);

        $roles = Role::all();

        return view('editProfile')
            ->with('user', $user)
            ->with('roles', $roles);
    }

    public function fillProfile($id) {

        $user = User::find($id);

        $roles = Role::all();

        return view('fillProfile')
            ->with('user', $user)
            ->with('roles', $roles);
    }

    public function updateProfile(Request $request, $id) {

        $user = User::find($id);

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->profile->age = $request->input('age');
        $user->profile->image_url = $request->input('image_url');
        $user->profile->title = $request->input('title');
        $user->profile->biography = $request->input('biography');
        $user->profile->education = $request->input('education');
        $user->profile->linkedin = $request->input('linkedin');
//        $user->roles()->sync([$request->input('role')]);

        $user->save();
        $user->profile->save();

        return redirect('/dashboard');
    }
}
