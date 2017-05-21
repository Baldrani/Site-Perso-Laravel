<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Comments;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all()->sortByDesc('updated_at');
        $categories = Category::all()->sortByDesc('name');
        $lastArticles = Article::all()->sortByDesc('created_at')->take(5);


        $specificHeader  = '<script src="/prism/prism.js"></script>';
        $specificHeader .= '<link rel="stylesheet" href="/prism/prism.css" type="text/css">';

        return view('blog.index')
            ->withArticles($articles)
            ->withCategories($categories)
            ->with('lastArticles', $lastArticles)
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
        $categories = Category::all()->sortBy('name');

        $postRoute = route('blog.store');
        $specificHeader = '<script src="/prism/prism.js"></script>';
        $specificHeader .= '<link rel="stylesheet" href="/prism/prism.css" type="text/css">';


        return view('blog.add')
            ->withCategories($categories)
            ->with('postRoute',$postRoute)
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

        $comments = $article->comments()->get();
        // dd($comments{0}->user);

        return view('blog.article')
            ->withArticle($article)
            ->withComments($comments)
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
        //TODO Ne pas afficher les catégories déjà selectionnées ~~~ Afficher les categories aux quel il appartient ~~~ Fix belongsToMany !!!

        $article = Article::find($id);
        $articles = Article::all()->sortByDesc('created_at');
        $categories = Category::all();

        $categoriesIsIn = $article->categories();
        // dd($categoriesIsIn);

        $postRoute = route('blog.update', $article->id);
        $specificHeader = '<script src="/prism/prism.js"></script>';
        $specificHeader .= '<link rel="stylesheet" href="/prism/prism.css" type="text/css">';

        return view('blog.add')
            ->withArticle($article)
            ->withArticles($articles)
            ->withCategories($categories)
            ->with('categoriesIsIn', $categoriesIsIn)
            ->with('postRoute', $postRoute)
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
