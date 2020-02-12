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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('json')->group(function(){
    Route::prefix('auth')->group(function(){
        Route::get('login', 'AuthController@viewLogin')->name('auth.login');
        Route::post('login', 'AuthController@login');
        Route::post('logout', 'AuthController@lo/gout');
    });

    Route::resource('cars', 'CarController');
    Route::get('/sales', 'SalesController@index');
    Route::post('/sales', 'SalesController@store');
    Route::get('/summary', 'SalesController@summary');
    Route::post('/sales/{sales}/sendInvoice', 'SalesController@sendInvoice');
});
