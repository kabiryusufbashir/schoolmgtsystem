<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentregistrationsession extends Model
{
    use HasFactory;

    protected $fillable = [
        'session',
        'student_id',
        'status',
        'proof_of_payment',
        'registered_by',
        'registered',
    ];

    public function studentName($id)
    {
        if($id){
            $student = Student::where('user_id', $id)->first();
            $title = $student->title;
            $first_name = $student->first_name;
            $last_name = $student->last_name;
            $other_name = $student->other_name;
            $full_name = $title.' '.$first_name.' '.$last_name.' '.$other_name;
            
            return $full_name;
        }else{
            return '';
        }
    }

    public function studentDepartment($student_id)
    {
        if($student_id){
            $student = Student::where('user_id', $student_id)->first();
            $student_dept = $student->department;
                if($student_dept){
                    $student_department = Department::where('id', $student_dept)->first();
                    if($student->department != 0){
                        return $student_department->name;
                    }else{
                        return '';
                    }
                }else{
                    return '';
                }
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

    public function dateFormat($date){
        if($date){
            //l : a full textual representation of a day
            //F : a full textual representation of a month
            $date_format = date('g:i a, l d, F Y', strtotime($date));
                return $date_format;
        }else{
            return '';
        }
    }
}
