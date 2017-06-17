<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can {name}, 're;gister web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|r
*/

//TODO MiddleWare blog ? At least separate url

Route::get('/',                     'homeController@showIndex');

Route::resource('/blog',            'ArticleController');

Route::get('/add/category',         'AjaxController@addCategory');
Route::get('/remove/category',      'AjaxController@removeCategory');

Route::get('/projects/{name}',      'ProjectController@showProjects');
Route::get('/category/{name}',       'BlogController@showCategory');

Route::post('/postcomment',         'AjaxController@postComment');

Route::post('/dologin',             'UserController@doLogin');

Auth::routes();
//TODO Clean /register
