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
    ];

    public function department($id)
    {
        $department = Department::where('id', $id)->first(); 
        return $department->name;
    }
}
