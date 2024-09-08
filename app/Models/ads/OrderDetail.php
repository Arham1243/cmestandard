<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_detail';
	// public $primaryKey = 'id';
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public function orderDetailBelongsToOrder()
    {
        return $this->belongsTo('App\Models\Orders','order_id');
    }
}
