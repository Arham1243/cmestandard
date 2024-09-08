<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagetable extends Model
{
    protected $table = 'imagetable';
    public $primaryKey = 'id';
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public function get_profiles()
    {
        return $this->belongsTo("App\Models\Profile", 'profile_id');
    }
}
