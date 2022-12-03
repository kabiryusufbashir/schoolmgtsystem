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

    public function courseName($id)
    {
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

    public function courseCode($id)
    {
        if($id){
            $course = Course::where('id', $id)->first();
            $course_code = $course->course_code;
            
            return $course_code;
        }else{
            return '';
        }
    }

    public function courseUnit($id)
    {
        if($id){
            $course = Course::where('id', $id)->first();
            $course_unit = $course->course_unit;
            
            return $course_unit;
        }else{
            return '';
        }
    }

    public function courseType($id)
    {
        if($id){
            $course = Course::where('id', $id)->first();
            $course_type = $course->course_type;
            
            return $course_type;
        }else{
            return '';
        }
    }

    public function resultPercentageScore($id){
        if($id){
            $results = Result::where('id', $id)->first();
            $ca = $results->ca;
            $exams = $results->exams;
            $percentage_score = $exams + $ca;
            return $percentage_score;
        }else{
            return '';
        }
    }

    public function resultGrade($id){
        if($id){
            $results = Result::where('id', $id)->first();
            $ca = $results->ca;
            $exams = $results->exams;
            $percentage_score = $exams + $ca;
                if($percentage_score >= 70){
                    return 'A';
                }else if($percentage_score >= 60 && $percentage_score <= 69){
                    return 'B';
                }else if($percentage_score >= 50 && $percentage_score <= 59){
                    return 'C';
                }else if($percentage_score >= 45 && $percentage_score <= 49){
                    return 'D';
                }else if($percentage_score >= 44 && $percentage_score <= 40){
                    return 'E';
                }else{
                    return 'F';
                }
        }else{
            return '';
        }
    }

    public function resultGradePoint($id){
        if($id){
            $results = Result::where('id', $id)->first();
            $ca = $results->ca;
            $exams = $results->exams;
            $percentage_score = $exams + $ca;
                if($percentage_score >= 70){
                    return '5';
                }else if($percentage_score >= 60 && $percentage_score <= 69){
                    return '4';
                }else if($percentage_score >= 50 && $percentage_score <= 59){
                    return '3';
                }else if($percentage_score >= 45 && $percentage_score <= 49){
                    return '2';
                }else if($percentage_score >= 44 && $percentage_score <= 40){
                    return '1';
                }else{
                    return '0';
                }
        }else{
            return '';
        }
    }

    public function cumulativeWeight($id){
        if($id){
            $results = Result::where('id', $id)->first();
            
            $ca = $results->ca;
            $course_id = $results->course;
            $exams = $results->exams;
            $percentage_score = $exams + $ca;
            
            $course = Course::where('id', $course_id)->first();
            $course_unit = $course->course_unit;

                if($percentage_score >= 70){
                    $weight = $course_unit * 5;
                    return $weight;
                }else if($percentage_score >= 60 && $percentage_score <= 69){
                    $weight = $course_unit * 4;
                    return $weight;
                }else if($percentage_score >= 50 && $percentage_score <= 59){
                    $weight = $course_unit * 3;
                    return $weight;
                }else if($percentage_score >= 45 && $percentage_score <= 49){
                    $weight = $course_unit * 2;
                    return $weight;
                }else if($percentage_score >= 44 && $percentage_score <= 40){
                    $weight = $course_unit * 1;
                    return $weight;
                }else{
                    $weight = $course_unit * 0;
                    return $weight;
                }
        }else{
            return '';
        }
    }
}
