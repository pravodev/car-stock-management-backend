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
Route::get('/', function(){
    return view('index');
});
// Route::prefix('auth')->group(function(){
//     Route::get('login', 'AuthController@viewLogin')->name('auth.login');
//     Route::post('login', 'AuthController@login');
//     Route::post('logout', 'AuthController@lo/gout');
// });

// Route::middleware('auth')->group(function(){
//     Route::get('/', function () {
//         return redirect()->to('/dashboard');
//     });
    
//     Route::get('/dashboard', 'DashboardController');
    
//     Route::get('/qrcode', function(){
//         return view('qrcode');
//     });
    
//     Route::get('status', function(){
//         $api = \App::make('chat-api');
//         dd($api->getInbox());
//         dd($api->getStatus());
//     });

//     Route::resource('/master-data/cars', 'CarController');
// });
