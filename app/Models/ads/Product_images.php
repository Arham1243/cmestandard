<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_images extends Model
{
    protected $table = 'product_images';
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];
}
