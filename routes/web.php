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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// to load Any path when will loading will page 
// Route::get('/{anypath}', 'HomeController@index')->where('path','.*');

Route::post('/add-category','Admin\CategoryController@store')->name('add-category');
Route::get('/get-categories','Admin\CategoryController@index');
Route::get('/remove-category/{slug}','Admin\CategoryController@destroy');
Route::get('/show-category/{slug}','Admin\CategoryController@show');
Route::post('/update-category','Admin\CategoryController@update');

# Posts Route ->->->->-|-<-<-<-<-
Route::get('/get-posts','Admin\PostController@index');
Route::post('/add-posts','Admin\PostController@store');
Route::get('/remove-posts/{slug}','Admin\PostController@destroy');
Route::get('/show-posts/{slug}','Admin\PostController@show');
Route::post('/update-posts','Admin\PostController@update');