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

Route::group(['prefix' => 'auth'], function () {
  Route::post('login', 'Auth\AuthController@login');
  Route::post('register', 'Auth\RegisterController@register');
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

// Stripe
Route::post('client', 'PaymentController@client');
Route::post('pay', 'PaymentController@pay');
