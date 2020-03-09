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

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_ADMIN');
    }

    public function showALl() {

        $users = User::whereHas('roles')
            ->paginate(10);

        return view('admin.show-users')->with('users', $users);
    }

    public function showUser($id) {

        $user = User::with('profiles')
            ->find($id);

        return view('admin.show-user')->with('user', $user);
    }
}
