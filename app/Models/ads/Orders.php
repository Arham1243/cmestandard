<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
	// public $primaryKey = 'id';
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public function orderHasDetail()
   {     
       return $this->hasOne('App\Models\OrderDetail', 'order_id','id');  
   }

//    public function userorders()
//     {
//         return $this->hasMany('App\Models\User', 'id','user_id');
//     }
   
   
}
