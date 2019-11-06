<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    
    use SoftDeletes;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'image',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function category_news()
	{
		return $this->belongsToMany('App\Category');
    }
    
    public function getUser()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function getCategoryName() 
    {
        return $this->belongsToMany('App\Category');
    }
}
