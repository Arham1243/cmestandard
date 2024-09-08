<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonial';
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];


    public function get_testimonial_profiles()
    {
        return $this->belongsTo("App\Models\Profile", 'profile_id');
    }
}
