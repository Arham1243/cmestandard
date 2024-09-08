<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contest_participants extends Model
{
    protected $table = 'contest_participants';
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public function get_news()
    {
        return $this->hasMany(Assign_news::class, 'news_id', 'id');
    }
}
