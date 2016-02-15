<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('before' => 'auth'), function()
{

	Route::get('/auth/token/{token}', function()
	{
		// Session::put('session_auth_token','123123123k123k12h');
		// Session::put('auth_username','raymund');
		return View::make('index');

	});

	Route::get('/', function()
	{

	
		// Session::put('session_auth_token','123123123k123k12h');
		// Session::put('auth_username','raymund');
		return View::make('index');

	});
	

	//resource controllers
	Route::resource('shipments','ShipmentsController');
	Route::resource('products','ProductsController');



	Route::get('auth/logout',[ 'as' => 'auth.destroy','uses' => 'AuthController@destroy']);


	// Category Routes
	Route::post('category.store', ['as' => 'category.store','uses' => 'CategoriesController@store']);

	// User Routes
	Route::get('settings/system-users',['uses' => 'UsersController@index']);
	Route::post('settings/system-users',['as' => 'users.store','uses' => 'UsersController@store']);

	//Inventory Routes
	Route::get('/inventory',['uses' => 'InventoryController@index']);

	// Cart Routes
	Route::get('cash-register', ['uses' => 'CartController@index']);
	Route::get('products/search/{barcode}', ['uses' => 'CartController@searchProduct']);
	Route::get('cart/items', ['uses' => 'CartController@getAll']);

}); // end of route group


	//Auth Routes
	Route::get('auth/login',[ 'as' => 'auth.login','uses' => 'AuthController@get_login']);
	Route::post('auth/login',[ 'as' => 'auth.store','uses' => 'AuthController@post_login']);

