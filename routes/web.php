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



Auth::routes();
//front and backend integration
Route::get('/home','HomeController@index')->name('home');
Route::get('/admin','admin@index');
Route::get('/', function () {
    return view('pages.index');
});

//admin panel 
Route::get('admin/category','Admin\Category\CategoryController@category')->name('category');
//store the category
Route::post('admin/store/category','Admin\Category\CategoryController@storecategory')->name('store.category');

