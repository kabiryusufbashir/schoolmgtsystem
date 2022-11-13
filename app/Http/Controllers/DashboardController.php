<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function dashboard(){
        return view('dashboard.index');
    }

    public function settings(){
        return view('dashboard.settings.index');
    }
}
