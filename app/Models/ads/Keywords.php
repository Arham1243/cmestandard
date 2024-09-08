<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Keywords extends Model
{
	protected $table = 'keywords';
    protected $fillable = [
        'keywords', 'is_active','is_deleted'
    ];
    
    public function keywordHasCrawls()
    {
        return $this->hasMany('App\Models\Crawls', 'keyword_id','id');
    }
   
}
