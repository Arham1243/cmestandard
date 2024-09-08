<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{    
	protected $table = 'category';
    protected $guarded = [
        'id','created_at','updated_at'
    ];

    public function get_products()
    {
        return $this->hasMany(Products::class, 'category_id', 'id');
    }

    
}
