<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class AjaxController extends Controller
{
        public function addCategory(Request $request)
        {
                //TODO Gérer le cas où l'article n'est pas crée, il n'y a pas de foreign key encore.
                if(!empty($request->articleId)){
                        $id = $request->articleId;
                } else {
                        //TODO Gérer le cas 0 article
                        $id = Article::all()->last()->id;
                        $id++;
                }

                if(!\DB::table('article_category')->where('article_id', '=', $id)->where('category_id', '=', $request->id)->exists()){
                       \DB::table('article_category')->insert(['article_id' => $id, 'category_id' => $request->id]);
                }

                return response()->json($request->articleId);
        }

        public function removeCategory(Request $request)
        {
                if(isset($request->articleId)){
                        $id = $request->articleId;
                } else {
                        $id = Article::all()->last()->id;
                        $id++;
                }

                \DB::table('article_category')->where('article_id', '=', $id)->where('category_id', '=', $request->id)->delete();

                return response()->json('Supprimé');
        }
}
