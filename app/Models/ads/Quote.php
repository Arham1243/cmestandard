<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Quote extends Model
{
	protected $table = 'quote';
    protected $guarded = [
       'id',  'created_at', 'updated_at'
        
    ];
    
    
   
}
