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


Route::get('category/{slug}', 'NewsController@category')->name('category');
Route::get('article/{slug}', 'NewsController@article')->name('article');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function (){
    Route::get('/', 'MainController@index')->name('admin.index');
    Route::resource('/category', 'CategoryController', ['as' => 'admin']);
    Route::resource('/article', 'ArticleController', ['as' => 'admin']);
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
