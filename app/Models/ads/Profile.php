<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];
    public function get_profiles()
    {
        return $this->hasMany(Imagetable::class, 'profile_id', 'id');
    }
       public function get_publication_profiles()
    {
        return $this->hasMany(Publication::class, 'profile_id', 'id');
    }
    public function get_testimonial_profiles()
    {
        return $this->hasMany(Testimonial::class, 'profile_id', 'id');
    }
    public function get_bg_profiles()
    {
        return $this->hasMany(Section_bg::class, 'profile_id', 'id');
    }
    public function get_assign_profiles()
    {
        return $this->hasMany(Assign_courses::class, 'profile_id', 'id');
    }
    public function get_enroll_profiles()
    {
        return $this->hasMany(Courses_enrollment::class, 'profile_id', 'id');
    }
        public function get_roles()
    {
        return $this->belongsTo("App\Models\Role", 'role_id');
    }
}
