<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_videos extends Model
{
    protected $table = 'course_videos';
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];
}
