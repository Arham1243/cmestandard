<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_categories extends Model
{
    protected $table = 'blog_categories';
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];
}
