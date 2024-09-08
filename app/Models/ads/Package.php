<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{   
    protected $guarded = [
        'id','created_at','updated_at'
    ];
    
         public function get_package_perks()
    {
        return $this->hasMany(Packages_perk::class, 'package_id', 'id');
    }
    
    
}
