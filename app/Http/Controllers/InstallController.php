<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstallController extends Controller
{
    public function index(){
        return view('install.index');
    }

    public function step_1(){
        return view('install.step-1');
    }
}
