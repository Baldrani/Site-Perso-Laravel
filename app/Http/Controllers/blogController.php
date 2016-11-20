<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class blogController extends Controller
{
    public function showIndex()
    {
        $articles = DB::table('blog')
            ->orderBy('date','desc')
            ->get();

        return view('blog.index')
        ->with('articles',$articles)
        ->withTitle('Maël Mayon - Blog');
    }

    public function showEditIndex($var = null)
    {

        $articles = DB::select('select title,id from blog');

        if($var == 'ajax'){ //Ajoute ou Modifie

            $title = Input::get('title');
            $content = Input::get('content');
            $date = Input::get('date');
            if($date != null){
                $query = DB::table('users')
                    ->where('id', 1)
                    ->update(['title' => $title,'content' => $content, $date => date("F j, Y \a\t g:ia")]);
                return;
            }

            $query = DB::table('blog')->insertGetId(
                array('title' => $title, 'content' => $content)
            );

            return $query;
        }

        $article = new \stdClass();

        $article->id = "";
        $article->title = "";
        $article->content = "";
        $article->date = "";

        if($var != null){
            $tmp = DB::select('select * from blog where id = '.$var);
            $article->id = $tmp[0]->id;
            $article->title = $tmp[0]->title;
            $article->content = $tmp[0]->content;
            $article->date = $tmp[0]->date;
        }

        $specificHeader = '<script src="/ckeditor/ckeditor.js"></script>';
        $specificHeader .= '<script src="/prism/prism.js"></script>';
        $specificHeader .= '<link rel="stylesheet" href="/prism/prism.css" type="text/css">"';

        return view('blog.add')
        ->with('article',$article)
        ->with('articles',$articles)
        ->with('specificHeader',$specificHeader)
        ->withTitle('Edit Article');
    }



}
