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

Route::get('/article', 'articleController@index');
Route::get('/article/create', 'articleController@create');
Route::post('/article/articleStore', 'articleController@store');
Route::get('/category/create', 'categoryController@create');
Route::post('/category/Store', 'categoryController@store');
Route::get('/article/{id}/show', 'articleController@show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
