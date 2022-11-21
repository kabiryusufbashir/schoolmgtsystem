<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Student;

class StudentController extends Controller
{
    public function dashboard(){
        $student_user_id = Auth::user()->id;
        $student = Student::where('user_id', $student_user_id)->first();
        return view('student.index', compact('student'));
    }
}
