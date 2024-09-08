<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses_enrollment extends Model
{
    protected $table = 'courses_enrollment';
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];
    
       public function get_enroll_profiles()
    {
        return $this->belongsTo("App\Models\Profile", 'profile_id');
    }
       public function get_enroll_course()
    {
        return $this->belongsTo("App\Models\Course", 'course_id');
    }
       public function get_enroll_course_type()
    {
        return $this->belongsTo("App\Models\Course_type", 'course_type');
    }
      public function get_enroll_student()
    {
        return $this->belongsTo("App\Models\Courses_enrollment", 'registration_id');
    }
    
}
