<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;

class blogController extends Controller
{
    public function showIndex()
    {

        $articles = Article::all()->sortByDesc('created_at');
        $categories = Category::all()->sortByDesc('name');


        $specificHeader = '<script src="/prism/prism.js"></script>';
        $specificHeader .= '<link rel="stylesheet" href="/prism/prism.css" type="text/css">';

        return view('blog.index')
            ->withArticles($articles)
            ->withCategories($categories)
            ->with('specificHeader',$specificHeader)
            ->withTitle('Maël Mayon - Blog');
    }

    public function showEditIndex($var = null)
    {
        $articles = Article::all();
        $categories = Category::all()->sortBy('name');

        $id = Input::get('id');
        $title = Input::get('title');
        $content = Input::get('content');
        $date = Input::get('date');
        $category = Input::get('category');

        $article = Article::find($id);

        //Part Ajax
        if($var == "ajax"){
            if($date != null){
                // $article = Article::all();
                $query = DB::table('articles')
                ->where('id', $id)
                ->update(['title' => $title,'content' => $content]);

                $article = Article::find($id)->categories()->attach($category);

                return json_encode("Updated");
            }

            Article::insertGetId(
                array('title' => $title, 'content' => $content)
            );

            return  json_encode("Posted");
        }

        if($var == "delete"){
            Article::destroy($id);
            return  json_encode("Delated");
        }

        if($var != null){
            $article = Article::find($var);
        } else {
            $article = new \stdClass();
            $article->id = "";
            $article->title = "";
            $article->content = "";
            $article->created_at = "";
            $article->updated_at = "";
        }


        $specificHeader = '<script src="/ckeditor/ckeditor.js"></script>';

        return view('blog.add')
        ->withCategories($categories)
        ->withArticle($article)
        ->withArticles($articles)
        ->with('specificHeader',$specificHeader)
        ->withTitle('Edit Article');
    }

}
