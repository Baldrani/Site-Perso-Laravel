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

Route::get('/blog',             'blogController@showIndex');
Route::get('/blog/edit/{id}',   'blogController@showEditIndex');

Route::get('/blog/add',         'blogController@showEditIndex');
Route::post('/blog/add/{ajax}', 'blogController@showEditIndex');
Route::get('/blog/edit/{id}',   'blogController@showEditIndex');


// Route::get('/blog/{article}', 'blogController@showIndex');
