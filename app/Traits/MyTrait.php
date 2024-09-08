<?php

namespace App\Traits;
use Str;
trait MyTrait
{
      public function slug_maker($title, $model_name)
    {
        $base_slug = Str::slug($title, '-');
        $slug = $base_slug;
        $count = 1;
    
        while ($model_name::where('slug', $slug)->exists()) {
            $slug = $base_slug . '-' . $count;
            $count++;
        }
    
        return $slug;
    }
}