<?php
// app/Models/Gallery.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    protected $table = 'party_packages';
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];
}

