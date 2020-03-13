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
use Illuminate\Support\Facades\Hash;
use function foo\func;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showALl() {

        $users = User::whereHas('roles')
            ->paginate(10);

        return view('admin.show-users')->with('users', $users);
    }

    public function showUser($slug) {

        $user = User::with('profiles')
            ->where('slug', '=', $slug)
            ->first();

        return view('admin.show-user')->with('user', $user);
    }

    public function createAdmin() {

        return view('admin.create-new-admin');
    }

    public function storeAdmin(Request $request) {

        $admin = new User();

        $admin->first_name = $request->input('first_name');
        $admin->last_name = $request->input('last_name');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));

        $admin->save();

        $role = Role::where('name', '=', 'admin')->first();
        $admin->roles()->sync($role->id);

        return redirect('/admin');
    }
}
