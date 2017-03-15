<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'content'];

    /**
     * The category that belong to the article.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}
