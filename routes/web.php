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

// home page
Route::get('/', "HomeController@index");
Route::get('/index', 'HomeController@index');

// projects
Route::get('/projects', 'ProjectsController@index');
Route::get('/projects/{project}', 'ProjectsController@show');

// pages
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');

// shops
Route::get('/shop', 'ProductsController@index');
Route::get('/shop/{product}', 'ProductsController@show');

/**
 * Admin specific routes
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
	Route::get('/', 'HomeController@index');
	Route::resource('categories', 'CategoriesController');
	Route::resource('projects', 'ProjectsController');
	Route::resource('products', 'ProductsController');
	Route::resource('product-categories', 'ProductCategoriesController');

});