<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section_bg extends Model
{
    protected $table = 'section_bg';
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];
      public function get_bg_profiles()
    {
        return $this->belongsTo("App\Models\Profile", 'profile_id');
    }
}
