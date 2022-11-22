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
    ];
}
