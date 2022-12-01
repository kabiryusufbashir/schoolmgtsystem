<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentregistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'session',
        'semester',
        'student_id',
        'course_id',
        'registered_by',
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

    public function studentTimeTable($course){
        if(!empty($course)){
            $timetable = Timetable::where('course', $course)->get();
            if($timetable != ''){
                return $timetable;
            }else{
                return '';
            }    
        }else{
            return '';
        }
    }
    
}
