<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'hod',
        'level_coordinator',
        'exam_officer',
    ];

    public function staffFullName($id)
    {
        if($id){
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
