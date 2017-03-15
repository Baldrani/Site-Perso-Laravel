<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Article;

class blogController extends Controller
{
    public function showIndex()
    {
        $articles = Article::all()->sortByDesc('created_at');
        $categories = Category::all()->sortByDesc('name');

        $specificHeader  = '<script src="/prism/prism.js"></script>';
        $specificHeader .= '<link rel="stylesheet" href="/prism/prism.css" type="text/css">';

        return view('blog.index')
            ->withArticles($articles)
            ->withCategories($categories)
            ->with('specificHeader', $specificHeader)
            ->withTitle('Maël Mayon - Blog');
    }

    public function showArticle($id)
    {
        $article = Article::find($id);

        // dd($article);

        $specificHeader  = '<script src="/prism/prism.js"></script>';
        $specificHeader .= '<link rel="stylesheet" href="/prism/prism.css" type="text/css">';

        return view('blog.article')
            ->withArticle($article)
            ->with('specificHeader', $specificHeader)
            ->withTitle('Maël Mayon - Blog');
    }

    public function showAdd()
    {
        $specificHeader = '<script src="/prism/prism.js"></script>';
        $specificHeader .= '<link rel="stylesheet" href="/prism/prism.css" type="text/css">';

        return view('blog.add')
            ->with('specificHeader', $specificHeader)
            ->withTitle('Maël Mayon - Blog');
    }

    public function showEdit(Request $request, $id = null)
    {
        $articles = Article::all()->sortByDesc('created_at');
        $article = Article::updateOrCreate(['id'=>$request->id],
        [
            'title'=>$request->title,
            'content'=>$request->content,
        ]);


        $specificHeader = '<script src="/prism/prism.js"></script>';
        $specificHeader .= '<link rel="stylesheet" href="/prism/prism.css" type="text/css">';

        return view('blog.add')
            ->withArticle($article)
            ->withArticles($articles)
            ->with('specificHeader', $specificHeader)
            ->withTitle('Maël Mayon - Blog');
    }
}
