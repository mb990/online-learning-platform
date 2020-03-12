<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

public function show($slug) {

    $user = User::where('slug', '=', $slug)
        ->first();

    return view('educator')->with('user', $user);
}

    public function edit($slug) {

        $user = User::where('slug', '=', $slug)
        ->first();

        $roles = Role::all();

        return view('profiles.edit-profile')
            ->with('user', $user)
            ->with('roles', $roles);
    }

    public function update(Request $request, $slug) {

        $user = User::where('slug', '=', $slug)
            ->first();

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->profile->age = $request->input('age');
        $user->profile->image_url = $request->input('image_url');
        $user->profile->title = $request->input('title');
        $user->profile->biography = $request->input('biography');
        $user->profile->education = $request->input('education');
        $user->profile->linkedin = $request->input('linkedin');

        $user->save();
        $user->profile->save();

        return redirect('/profiles/' . $user->slug);
    }

    public function fill($slug) {

        $user = User::where('slug', '=', $slug)
            ->first();

        $roles = Role::all();

        return view('profiles.fill-profile')
            ->with('user', $user)
            ->with('roles', $roles);
    }

    public function store(Request $request, $slug) {

        $user = User::where('slug', '=', $slug)
            ->first();

        $user->profile->age = $request->input('age');
        $user->profile->image_url = $request->input('image_url');
        $user->profile->title = $request->input('title');
        $user->profile->biography = $request->input('biography');
        $user->profile->education = $request->input('education');
        $user->profile->linkedin = $request->input('linkedin');

        $user->profile->save();

        return redirect('/profiles/' . $user->slug);
    }
}
