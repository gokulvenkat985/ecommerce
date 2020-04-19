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
//admin category
Route::post('admin/store/category','Admin\Category\CategoryController@storecategory')->name('store.category');
Route::get('/delete/category/{id}','Admin\Category\CategoryController@deletecategory');
Route::post('admin/update/category','Admin\Category\CategoryController@updatecategory')->name('update.category');

///admin brands
Route::get('admin/brand','Admin\Category\Brandcontroller@brand')->name('brand');
Route::post('admin/store/brand','Admin\Category\Brandcontroller@storebrand')->name('store.brand');