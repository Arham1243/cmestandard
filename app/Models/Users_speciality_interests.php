<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users_speciality_interests extends Model
{
    protected $table = 'users_speciality_interests';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'

    ];
}
