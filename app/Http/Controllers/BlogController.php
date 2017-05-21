<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function showCategory($id){
        $category = Category::find($id);
        $articles = $category->articles;
        return view('blog.category')
            ->withArticles($articles);
    }
}
