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

        $articles = DB::table('article')
            ->orderBy('date','desc')
            ->get();

        $category = 

        $specificHeader = '<script src="/prism/prism.js"></script>';
        $specificHeader .= '<link rel="stylesheet" href="/prism/prism.css" type="text/css">';

        return view('blog.index')
        ->with('articles',$articles)
        ->with('specificHeader',$specificHeader)
        ->withTitle('Maël Mayon - Blog');
    }

    public function showEditIndex($var = null)
    {

        $articles = DB::select('select title,id from article');

        $id = Input::get('id');
        $title = Input::get('title');
        $content = Input::get('content');
        $date = Input::get('date');
        //Part Ajax
        if($var == "ajax"){


            if($date != null){

                    $query = DB::table('article')
                    ->where('id', $id)
                    ->update(['title' => $title,'content' => $content]);

                    return json_encode("Updated");
            }

            $query = DB::table('article')->insertGetId(
                array('title' => $title, 'content' => $content)
            );

            return  json_encode("Posted");
        }

        if($var == "delete"){
            DB::table('article')
            ->where('id', $id)
            ->delete();

            return  json_encode("Delated");
        }

        /* De là à */
        $article = new \stdClass();

        $article->id = "";
        $article->title = "";
        $article->content = "";
        $article->date = "";

        if($var != null){
            $tmp = DB::select('select * from article where id = ' . $var);
            $article->id = $tmp[0]->id;
            $article->title = $tmp[0]->title;
            $article->content = $tmp[0]->content;
            $article->date = $tmp[0]->date;
        }

        /* ICIIII */

        $specificHeader = '<script src="/ckeditor/ckeditor.js"></script>';

        return view('blog.add')
        ->with('article',$article)
        ->with('articles',$articles)
        ->with('specificHeader',$specificHeader)
        ->withTitle('Edit Article');
    }



}
