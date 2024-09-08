<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'product_reviews';
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];


    public function get_products()
    {
        return $this->belongsTo("App\Models\Products", 'product_id');
    }
    public function get_user()
    {
        return $this->belongsTo("App\Models\User", 'user_id');
    }
}
