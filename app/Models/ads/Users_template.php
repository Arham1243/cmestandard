<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_template extends Model
{   
    protected $guarded = [
        'id','created_at','updated_at'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
