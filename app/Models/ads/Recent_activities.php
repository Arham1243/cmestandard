<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recent_activities extends Model
{
    protected $table = 'recent_activities';
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];
}
