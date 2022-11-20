<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'session',
        'course',
        'semester',
        'student_id',
        'ca',
        'exams',
        'posted_by',
    ];

    public function studentMatricNo($id)
    {
        if($id != 0){
            $student = Student::where('user_id', $id)->first(); 
            return $student->matric_no;
        }else{
            return '';
        }
    }

    public function session($id){
        if($id){
            $session = Registration::where('id', $id)->first();
            $session_year = $session->session;
            return $session_year;
        }else{
            return '';
        }
    }

    public function course($id){
        if($id){
            $course = Course::where('id', $id)->first();
            $course_name = $course->name;
            $course_code = $course->course_code;
            $full_course = $course_code.'-'.$course_name;
            return $full_course;
        }else{
            return '';
        }
    }

    public function postedBy($id){
        if($id){
            $user = User::where('id', $id)->first();
            $posted_by = $user->name;
            return $posted_by;
        }else{
            return '';
        }
    }
}
