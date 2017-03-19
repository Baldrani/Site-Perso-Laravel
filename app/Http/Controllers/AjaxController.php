<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class AjaxController extends Controller
{
        public function addCategory(Request $request)
        {
                //Id de l'article qui va être posté
                if(isset($request->articleId)){
                        $id = $request->articleId;
                } else {
                        $id = Article::all()->last()->id;
                        $id++;
                }

                if(!\DB::table('article_category')->where('category_id', '=', $request->id)->where('article_id', '=', $id)->exists()){
                       \DB::table('article_category')->insert(['category_id' => $request->id, 'article_id' => $id]);
                }

                return response()->json('Ajouté');
        }

        public function removeCategory(Request $request)
        {
                //Id de l'article qui va être posté
                if(isset($request->articleId)){
                        $id = $request->articleId;
                } else {
                        $id = Article::all()->last()->id;
                        $id++;
                }

                \DB::table('article_category')->where('category_id', '=', $request->id)->where('article_id', '=', $id)->delete();

                return response()->json('Supprimé');
        }
}
