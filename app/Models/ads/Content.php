<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Content extends Model
{
	protected $table = 'content';
    protected $fillable = [
        'page_name', 'content1', 'content2','content3','content4','content5','content6','content7','img1','img2',
    ];
   
}
