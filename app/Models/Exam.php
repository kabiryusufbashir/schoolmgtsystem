<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'session',
        'exam_type',
        'semester',
        'start_date',
        'end_date',
        'posted_by',
    ];

    public function session($id){
        if($id){
            $session = Registration::where('id', $id)->first();
            $session_year = $session->session;
            return $session_year;
        }else{
            return '';
        }
    }

    public function postedBy($id){
        if($id){
            $user = User::where('id', $id)->first();
            $posted_by = $user->name;
            return $posted_by;
        }else{
            return '';
        }
    }

    public function dateFormat($date){
        if($date){
            //l : a full textual representation of a day
            //F : a full textual representation of a month
            $date_format = date('l d, F Y', strtotime($date));
                return $date_format;
        }else{
            return '';
        }
    }
}
