<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('homepage');
    }

    public function admin() {

        return view('admins.index');
    }
}
