<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specificHeader = '<script src="/prism/prism.js"></script>';
        $specificHeader .= '<link rel="stylesheet" href="/prism/prism.css" type="text/css">';

        return view('blog.add')
            ->with('specificHeader', $specificHeader)
            ->withTitle('Maël Mayon - Blog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = Article::updateOrCreate(
        [
            'title'=>$request->title,
            'content'=>$request->content,
        ]);

        return redirect('/blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);

        $specificHeader  = '<script src="/prism/prism.js"></script>';
        $specificHeader .= '<link rel="stylesheet" href="/prism/prism.css" type="text/css">';

        return view('blog.article')
            ->withArticle($article)
            ->with('specificHeader', $specificHeader)
            ->withTitle('Maël Mayon - Blog');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Article::all()->sortByDesc('created_at');
        $article = Article::find($id);


        $specificHeader = '<script src="/prism/prism.js"></script>';
        $specificHeader .= '<link rel="stylesheet" href="/prism/prism.css" type="text/css">';

        return view('blog.add')
            ->withArticle($article)
            ->withArticles($articles)
            ->with('specificHeader', $specificHeader)
            ->withTitle('Maël Mayon - Blog');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id)
            ->update([
            'title'=>$request->title,
            'content'=>$request->content,
            ]);

        return redirect('/blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
