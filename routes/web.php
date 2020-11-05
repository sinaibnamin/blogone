<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/home','HomeController@index')->name('home');

// frontend
Route::get('/','FeController@home')->name('website');
Route::get('/aboout','FeController@about')->name('website.about');
Route::get('/category','FeController@category')->name('website.category');
Route::get('/contact','FeController@contact')->name('website.contact');
Route::get('/post/{slug}','FeController@post')->name('website.post');
Route::get('/category/{slug}','FeController@category')->name('website.category');
Route::get('/tag/{slug}','FeController@tag')->name('website.tag');








// admin routes

Route::group(['prefix'=>'admin','middleware'=>['auth']],function(){
  Route::get('/dashboard', function () {
      return view('admin.dashboard.index');

  });

Route::resource('/category','CategoryController');
Route::resource('/tag','TagController');
Route::resource('/post','PostController');
Route::resource('/user','UserController');


});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
