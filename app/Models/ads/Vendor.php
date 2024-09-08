<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{    
	protected $table = 'vendor';
    protected $guarded = [
        'id','created_at','updated_at'
    ];

    public function vendorHasProducts()
    {
    return $this->hasMany(Products::class,'vendor_id','id');
    }
    
    //  public function categoryHasCrawl()
    // {
    //      return $this->hasMany(Crawls::class,'main_category_id','id');
    //     //return $this->hasOne('App\Models\Crawls', 'main_category_id','id');
    // }

}
