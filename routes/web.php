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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PagesController@dashboard')->name('dashboard');

Auth::routes();
  
Route::get('/home', 'HomeController@index')->name('home');

// Master data route

// Categories
Route::get('/categories', 'master\CategoriesController@index')->name('categories');
Route::post('/categories', 'master\CategoriesController@store')->name('categories-add');
Route::delete('/categories/{id}', 'master\CategoriesController@destroy')->name('categories-delete');
Route::post('/categories-edit', 'master\CategoriesController@edit')->name('categories-edit');
Route::post('/categories-update', 'master\CategoriesController@update')->name('categories-update');