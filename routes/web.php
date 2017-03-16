<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',                 'homeController@showIndex');

Route::resource('/blog',            'ArticleController');

Route::get('/add/category',         'AjaxController@addCategory');
Route::get('/remove/category',      'AjaxController@removeCategory');

Auth::routes();
