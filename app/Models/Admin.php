<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Admin extends Model
{
	protected $table = 'admin';
    protected $fillable = [
        'name', 'email', 'password','type','is_active','is_deleted'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
