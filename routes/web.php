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

// Customers
Route::get('/customers', 'master\CustomersController@index')->name('customers');
Route::get('/customers-city', 'master\CustomersController@city')->name('customers-city');
Route::post('/customers', 'master\CustomersController@store')->name('customers-add');
Route::delete('/customers/{id}', 'master\CustomersController@destroy')->name('customers-delete');
Route::post('/customers-detail', 'master\CustomersController@show')->name('customers-detail');
Route::post('/customers-edit', 'master\CustomersController@edit')->name('customers-edit');
Route::post('/customers-update', 'master\CustomersController@update')->name('customers-update');

// Products
Route::get('/products', 'master\ProductsController@index')->name('products');
Route::post('/products', 'master\ProductsController@store')->name('products-add');
Route::delete('/products/{id}', 'master\ProductsController@destroy')->name('products-delete');
Route::post('/products-detail', 'master\ProductsController@show')->name('products-detail');
Route::post('/products-edit', 'master\ProductsController@edit')->name('products-edit');
Route::post('/products-update', 'master\ProductsController@update')->name('products-update');