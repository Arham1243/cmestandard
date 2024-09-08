<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $table = 'publication';
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];
    
       public function get_publication_profiles()
    {
        return $this->belongsTo("App\Models\Profile", 'profile_id');
    }
       public function get_publication_users()
    {
        return $this->belongsTo("App\Models\User", 'user_id');
    }
}
