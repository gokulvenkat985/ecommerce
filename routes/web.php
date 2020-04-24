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
Route::get('/delete/brand/{id}','Admin\Category\Brandcontroller@deletebrand');
Route::get('/edit/brand/{id}','Admin\Category\Brandcontroller@editbrand');
Route::post('update/brand/{id}','Admin\Category\Brandcontroller@updatebrand');

///admin sub_category 
Route::get('admin/sub_category','Admin\Category\SubCategoryController@index')->name('sub_category');
Route::post('admin/store/sub_category','Admin\Category\SubCategoryController@storesubcategory')->name('store.subcategory');
Route::get('delete/subcategory/{id}','Admin\Category\SubCategoryController@deletecategory');
Route::post('admin/update/sub_category','Admin\Category\SubCategoryController@updatesubcategory')->name('update.subcategory');

///coupon
Route::get('admin/coupon','Admin\Category\CouponController@index')->name('coupon');
Route::post('admin/store/coupon','Admin\Category\CouponController@storecoupon')->name('store.coupon');
Route::get('delete/category/coupon/{id}','Admin\Category\CouponController@deletecoupon');
Route::post('admin/store/update','Admin\Category\CouponController@updatecoupon')->name('update.coupon');

////news later
Route::get('admin/newslater','Admin\Category\CouponController@newslater')->name('newslater');
Route::get('delete/newslater/{id}','Admin\Category\CouponController@deletenewslater');

///front end newslater
Route::post('store/newslater','Frontend\FrontController@storenewslater')->name('newslater.email');

///admin Product route
Route::get('admin/product/all','Admin\Product\productcontroller@allproduct')->name('all.product');
Route::get('admin/product/add','Admin\Product\productcontroller@addproduct')->name('add.product');
Route::post('admin/product/store','Admin\Product\productcontroller@storeproduct')->name('product.store');
//ajax for select tab in add product  
Route::post('ajax/subcategory','Admin\Product\productcontroller@ajaxproduct')->name('ajax.subcategory');

///all product page
Route::get('/inactive/product/{id}','Admin\Product\productcontroller@inactive');

Route::get('/Active/product/{id}','Admin\Product\productcontroller@active');
Route::get('/delete/product/{id}','Admin\Product\productcontroller@delete');
Route::get('/view/product/{id}','Admin\Product\productcontroller@viewproduct');