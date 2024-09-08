<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile_config extends Model
{
    protected $table = 'profile_config';
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public function get_profiles()
    {
        return $this->belongsTo("App\Models\Profile", 'profile_id');
    }
}
