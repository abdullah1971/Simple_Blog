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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('post','postController');

Route::get('published/post','postController@published');
Route::get('drafted/post','postController@drafted');
Route::get('personal/post','postController@personal');

Route::post('search/post', 'HomeController@search');

Route::get('catagory/{catagory}', 'HomeController@catagory');
Route::get('archive/{year}', 'HomeController@archive');


