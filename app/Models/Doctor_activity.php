<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor_activity extends Model
{
    protected $table = 'doctor_activity';
    public $primaryKey = 'id';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function category()
    {
        return $this->belongsTo(Activity_categories::class, 'category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
