<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result_images extends Model
{
    protected $table = 'result_images';
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];
}
