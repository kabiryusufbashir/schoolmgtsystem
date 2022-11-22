<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'session',
        'semester',
        'active',
    ];

    public function status($id)
    {
        if($id){
            if($id == 1){
                return 'Active';
            }else{
                return 'Not Active';
            }
        }else{
            return '';
        }
    }
    
}
