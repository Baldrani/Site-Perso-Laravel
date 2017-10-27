<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function showCategory($name){
        $category = Category::where('name',$name)->first();
        $articles = $category->articles;
        return view('blog.category')
            ->withArticles($articles)
            ->withCategory($name);
    }
}
