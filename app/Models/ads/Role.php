<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];
    public function get_roles()
    {
        return $this->hasMany(Profile::class, 'role_id', 'id');
    }
    public function get_roles_users()
    {
        return $this->hasMany(Role::class, 'role_id', 'id');
    }
}
