<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    protected $table = 'planning_tips';
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

}
