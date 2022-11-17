<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Department;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'course_code',
        'course_type',
        'course_unit',
        'department',
        'lecturer',
    ];

    public function department($id)
    {
        if($id != ''){
            $department = Department::where('id', $id)->first(); 
            return $department->name;
        }else{
            return '';
        }
    }

    public function LecturerName($id)
    {
        if($id != ''){
            $staff = Staff::where('user_id', $id)->first();
            $title = $staff->title;
            $first_name = $staff->first_name;
            $last_name = $staff->last_name;
            $other_name = $staff->other_name;
            $full_name = $title.' '.$first_name.' '.$last_name.' '.$other_name;
            
            return $full_name;
        }else{
            return '';
        }
    }


}
