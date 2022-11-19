<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    protected $fillable = [
        'session',
        'activity',
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
            $date_format = date('D d M Y', strtotime($date));
                return $date_format;
        }else{
            return '';
        }
    }


}
