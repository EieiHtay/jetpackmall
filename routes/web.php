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
// /=>route in url -> Frontend
Route::get('/', 'FrontendController@index')->name('index');

Route::get('promotion','FrontendController@promotion')->name('promotion');

Route::get('subcategory/{id}','FrontendController@subcategory')->name('subcategory');

// brand/{id}=>url , FrontendController -> brand fun , name = frontend.blade.php ->brand
Route::get('brand/{id}','FrontendController@brand')->name('brand');

Route::get('cart','FrontendController@cart')->name('cart');

Route::post('order','FrontendController@order')->name('order');
Route::get('ordersuccess','FrontendController@ordersuccess')->name('ordersuccess');

Route::get('detail/{id}','FrontendController@detail')->name('detail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Basic Route
// Get method / hello=>route name
Route::get('hello','TestOneController@index');

Route::post('hello','TestOneController@index');


// For all method(get,post,put,patch,delete,options) / resource => no fun after controller(get for -r or --resource)
Route::resource('test','TestTwoController');

// Route Parameters => user/{id}
// GET Method
Route::get('user/{id}','TestThreeController@show');

// Multiple route parameters
Route::get('hellouser/{name}/{position}/{city}','TestOneController@user');

// Backend
Route::group(['middleware'=>'role:admin','prefix'=> 'backside','as'=>'backside.'],function(){
	Route::resource('/category','CategoryController');

	Route::resource('/subcategory','SubcategoryController');

	Route::resource('/brand','BrandController');

	Route::resource('/item','ItemController');

	Route::resource('/township','TownshipController');
});