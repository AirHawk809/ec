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

Route::post('register', 'Auth\RegisterController@register')->name('register');
Route::group(['prefix' => 'auth'], function () {
  Route::post('login', 'Auth\AuthController@login');
});

Route::group([
  'prefix' => 'auth',
  'middleware' => 'auth:api'
], function () {
  Route::post('logout', 'AuthController@logout');
  Route::post('refresh', 'AuthController@refresh');
  Route::post('me', 'AuthController@me');
});

// Products
Route::get('products', 'ProductController@index');
Route::get('products/{id}', 'ProductController@show');

// Admin
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function()
{
    Route::resource('products', 'ProductController');
    Route::get('orders', 'ProductController@orders');
});
