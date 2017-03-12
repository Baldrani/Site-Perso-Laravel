<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The category that belong to the article.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}
