<?php
// app/Models/Gallery.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['title', 'img_path', 'is_active'];

    // Additional model properties, relationships, or methods can be added here

    // Example of a mutator to manipulate the title before saving
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucfirst($value);
    }
}
