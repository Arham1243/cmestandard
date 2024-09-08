<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_type extends Model
{
    protected $table = 'course_type';
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];
     public function get_course_type()
    {
        return $this->hasMany(Course::class, 'course_type', 'id');
    }
     public function get_course_type_alt()
    {
        return $this->hasMany(Assign_courses::class, 'course_type', 'id');
    }
        public function get_enroll_course_type()
    {
        return $this->hasMany(Courses_enrollment::class, 'course_type', 'id');
    }
}
