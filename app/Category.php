<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = "categories";

    protected $fillable = [
        "name_category",
        "created_by",
        "updated_by",
        "deleted_by",
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    public function getUser()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function category_news()
    {
        return $this->belongsToMany('App\News');
    }
}
