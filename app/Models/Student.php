<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Model;

class Student extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'matric_no',
        'title',
        'first_name',
        'last_name',
        'other_name',
        'dob',
        'gender',
        'lga',
        'state',
        'nationality',
        'marital_status',
        'address',
        'city',
        'state',
        'country',
        'email',
        'phone',
        'department',
        'photo',
        'username',
        'password',
        'status',
    ];

    public function department($id)
    {
        if($id != 0){
            $department = Department::where('id', $id)->first(); 
            return $department->name;
        }else{
            return '';
        }
    }

    public function fullName($id)
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

    public function studentFullName($id)
    {
        if($id != ''){
            $student = Student::where('user_id', $id)->first();
            if($student){
                $title = $student->title;
                $first_name = $student->first_name;
                $last_name = $student->last_name;
                $other_name = $student->other_name;
                $full_name = $title.' '.$first_name.' '.$last_name.' '.$other_name;
                
                return $full_name;
            }
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

    public function studentYearAdmitted($id)
    {
        if($id != 0){
            $student = Student::where('user_id', $id)->first(); 
            return $student->year_admitted;
        }else{
            return '';
        }
    }
}
