<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity_categories extends Model
{
    protected $table = 'activity_categories';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'

    ];
}
