<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assign_news extends Model
{
    protected $table = 'assign_news';
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];
    public function get_assign_profiles()
    {
        return $this->belongsTo("App\Models\Profile", 'profile_id');
    }
    public function get_news()
    {
        return $this->belongsTo("App\Models\News", 'news_id');
    }
}
