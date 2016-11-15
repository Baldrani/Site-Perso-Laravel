<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class blogController extends Controller
{
    public function showIndex()
    {
        $articles = DB::select('select * from blog');

        return view('blog')
        ->with('articles',$articles)
        ->withTitle('Maël Mayon - Blog');
    }

    public function showEditIndex($id)
    {
        $article = DB::select('select * from blog where id = '.$id);

        $specificHeader = '<script src="/ckeditor/ckeditor.js"></script>';

        // dd($article);

        return view('blog.edit')
        ->with('article',$article)
        ->with('specificHeader',$specificHeader)
        ->withTitle('Edit Blog');
    }
}
