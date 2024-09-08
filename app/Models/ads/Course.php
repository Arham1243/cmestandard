<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public function get_courses()
    {
        return $this->hasMany(Assign_courses::class, 'course_id', 'id');
    }
    public function get_course_type()
    {
        return $this->belongsTo("App\Models\Course_type", 'course_type');
    }
    public function get_enroll_course()
    {
        return $this->hasMany(Courses_enrollment::class, 'course_id', 'id');
    }
}
