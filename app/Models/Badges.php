<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Badges extends Model
{
    protected $table = 'badges';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];
    
    public function getNameAttribute($value)
{
    return strtolower($value);
}
}
