<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Department;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
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
}
