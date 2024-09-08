<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assign_courses extends Model
{
    protected $table = 'assign_courses';
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];
    public function get_assign_profiles()
    {
        return $this->belongsTo("App\Models\Profile", 'profile_id');
    }
    public function get_courses()
    {
        return $this->belongsTo("App\Models\Course", 'course_id');
    }
    public function get_course_type_alt()
    {
        return $this->belongsTo("App\Models\Course_type", 'course_type');
    }
}
