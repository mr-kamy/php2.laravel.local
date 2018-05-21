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



Route::get('/', 'FrontController@index');
Route::get('/gallery', 'GalleryController@index');


Route::group(['prefix' => 'admin'], function (){
   Route::get('/', function (){
      return view('admin.dashboard');
   });
   Route::resource('articles', 'ArticlesController');

   Route::get('gallery', 'ImagesController@index');
   Route::post('gallery', 'ImagesController@upload');
   Route::delete('gallery/{id}', 'ImagesController@destroy');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
