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

    public function hod($id)
    {
        $hod = User::where('id', $id)->first(); 
        return $hod->name;
    }

    public function levelCoordinator($id)
    {
        $level_coordinator = User::where('id', $id)->first(); 
        return $level_coordinator->name;
    }

    public function examOfficer($id)
    {
        $exam_officer = User::where('id', $id)->first(); 
        return $exam_officer->name;
    }
    
}
