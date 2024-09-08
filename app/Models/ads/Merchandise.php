<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{    
	protected $table = 'merchandise';
    protected $guarded = [
        'id','created_at','updated_at'
    ];

    public function merchandiseBelongsToCategory()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function merchandiseHasMainImage()
    {
    return $this->hasMany(ShopImage::class,'ref_id','id')->where('img_type', 1);
    }

    public function merchandiseHasMultiImages()
    {
    return $this->hasMany(ShopImage::class,'ref_id','id')->where('img_type', 2);
    }

    public function merchandiseHasReviews()
    {
            return $this->hasMany(Review::class,'item_id','id')->where('type', 2);
    }

   
    
    

}
