<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
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
        $student = Student::where('user_id', $id)->first();
        $title = $student->title;
        $first_name = $student->first_name;
        $last_name = $student->last_name;
        $other_name = $student->other_name;
        $full_name = $title.' '.$first_name.' '.$last_name.' '.$other_name;
        
        return $full_name;
    }
}
