<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;

class blogController extends Controller
{
    public function showIndex()
    {

        $articles = DB::table('articles')
            ->orderBy('created_at','desc')
            ->get();

        $specificHeader = '<script src="/prism/prism.js"></script>';
        $specificHeader .= '<link rel="stylesheet" href="/prism/prism.css" type="text/css">';

        return view('blog.index')
        ->with('articles',$articles)
        ->with('specificHeader',$specificHeader)
        ->withTitle('Maël Mayon - Blog');
    }

    public function showEditIndex($var = null)
    {

        $articles = DB::select('select title,id from articles');
        $id = Input::get('id');
        $title = Input::get('title');
        $content = Input::get('content');
        $date = Input::get('date');

        //Part Ajax
        if($var == "ajax"){
            if($date != null){

                    $query = DB::table('articles')
                    ->where('id', $id)
                    ->update(['title' => $title,'content' => $content]);

                    return json_encode("Updated");
            }

            $query = DB::table('articles')->insertGetId(
                array('title' => $title, 'content' => $content)
            );

            return  json_encode("Posted");
        }

        if($var == "delete"){
            DB::table('articles')
            ->where('id', $id)
            ->delete();

            return  json_encode("Delated");
        }

        if($var != null){
            $article = Article::where('id', $var)->first();
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
        ->with('article',$article)
        ->with('articles',$articles)
        ->with('specificHeader',$specificHeader)
        ->withTitle('Edit Article');
    }



}
