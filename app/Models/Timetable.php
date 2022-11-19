<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;

    protected $fillable = [
        'session',
        'course',
        'department',
        'venue',
        'day',
        'start_date',
        'end_date',
        'posted_by',
    ];

    public function session($id){
        if($id){
            $session = Registration::where('id', $id)->first();
            $session_year = $session->session;
            return $session_year;
        }else{
            return '';
        }
    }

    public function department($id){
        if($id){
            $department = Department::where('id', $id)->first();
            $department_name = $department->name;
            return $department_name;
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

    public function dateFormat($date){
        if($date){
            //l : a full textual representation of a day
            //F : a full textual representation of a month
            $date_format = date('l d, F Y', strtotime($date));
                return $date_format;
        }else{
            return '';
        }
    }
}
