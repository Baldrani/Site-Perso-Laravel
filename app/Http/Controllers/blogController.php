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
        $articles = DB::select('select * from blog');

        return view('blog.index')
        ->with('articles',$articles)
        ->withTitle('Maël Mayon - Blog');
    }

    public function editArticle($id)
    {
        $article = DB::select('select * from blog where id = '.$id);

        $specificHeader = '<script src="/ckeditor/ckeditor.js"></script>';

        // dd($article);

        return view('blog.edit')
        ->with('article',$article)
        ->with('specificHeader',$specificHeader)
        ->withTitle('Edit Blog');
    }

    public function addArticle()
    {
        $specificHeader = '<script src="/ckeditor/ckeditor.js"></script>';

        $title    = Input::get('title');
        $content = Input::get('content');

        DB::table('blog')->insertGetId(
            array('title' => $title, 'content' => $content, 'date' => DEFAULT)
        );

        return view('blog.add')
        ->with('specificHeader',$specificHeader)
        ->withTitle('Edit Blog');
    }
}
