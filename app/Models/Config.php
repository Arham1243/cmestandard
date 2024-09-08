<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Config extends Model
{
	protected $table = 'config';
    protected $fillable = [
        'flag_type', 'flag_value', 'flag_additionalText','is_active','is_deleted'
    ];
   
}
