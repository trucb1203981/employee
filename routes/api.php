<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

Route::group(['middleware' => ['api']], function() {
	//TEST MAIL
	Route::get('/SendMail', function() {
		Mail::to('sp.dofuu@gmail.com')->send(new TestMail());	
	});
	//LOGIN
	Route::post('/login', 'AuthController@login');
	//LOGOUT
	Route::post('/logout', 'AuthController@logout');
	//REFRESH TOKEN
	Route::post('/refresh', 'AuthController@refresh');
	//GET INFORMATION
	Route::post('/dfe', 'AuthController@me');
	//GET CITY
	Route::get('/GetCity', 'CityController@getCity');
	//GET DISTRICT
	Route::get('/GetDistrict', 'DistrictController@getDistrict');
	//GET STORE
	Route::get('/GetStore', 'StoreController@getStore');
	//GET STORE BY ID
	Route::get('/GetStore/{sid}', 'StoreController@showStore');
	//ADD STORE
	Route::post('/AddStore', 'StoreController@addStore');
	//UPDATE STORE
	Route::put('/UpdateStore/{sid}', 'StoreController@updateStore');
	//UPDATE ACTIVITY FOR STORE
	Route::post('/UpdateStore/{sid}/Activity', 'StoreController@updateActivity');
	//GET TYPE
	Route::get('/GetType', 'TypeController@getType');
	//GET ACTIVITY
	Route::get('/GetActivity', 'ActivityController@getActivity');
	//GET MENU
	Route::get('/GetStore/{sid}/Menu', 'MenuController@getMenu');
	//GET CATALOGUE
	Route::get('/GetStore/{sid}/Menu/Catalogue', 'MenuController@getCatalogue');
	//ADD CATALOGUE
	Route::post('/GetStore/{sid}/Menu/Catalogue/Add', 'MenuController@addCatalogue');
	//EDIT CATALOGUE
	Route::post('/GetStore/{sid}/Menu/Catalogue/Edit', 'MenuController@editCatalogue');
	//GET TOPPING
	Route::get('/GetStore/{sid}/Menu/Topping', 'MenuController@getTopping');
	//ADD TOPPING
	Route::post('/GetStore/{sid}/Menu/Topping/Add', 'MenuController@addTopping');
	//EDIT TOPPING
	Route::post('/GetStore/{sid}/Menu/Topping/Edit', 'MenuController@editTopping');
	//GET SIZE
	Route::get('/GetStore/{sid}/Menu/Size', 'MenuController@getSize');
	//ADD SIZE
	Route::post('/GetStore/{sid}/Menu/Size/Add', 'MenuController@addSize');
	//EDIT SIZE
	Route::post('/GetStore/{sid}/Menu/Size/Edit', 'MenuController@editSize');
	//GET PRODUCT
	Route::get('/GetStore/{sid}/Menu/Product', 'MenuController@getProduct');
	//ADD PRODUCT
	Route::post('/GetStore/{sid}/Menu/Product/Add', 'MenuController@addProduct');
	//EDIT PRODUCT
	Route::post('/GetStore/{sid}/Menu/Product/Edit', 'MenuController@editProduct');
	//GET PRODUCT STATUS
	Route::get('/GetProductStatus', 'MenuController@getProductStatus');
});