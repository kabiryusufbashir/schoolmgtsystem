<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentregistrationsemester extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'session',
        'semester',
        'student_id',
        'proof_of_payment',
        'status',
        'registered_by',
    ];
    
}
