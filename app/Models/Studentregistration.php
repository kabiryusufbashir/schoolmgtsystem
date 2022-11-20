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
}
