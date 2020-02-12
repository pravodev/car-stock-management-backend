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

Route::get('/', function () {
    $api = \App::make('chat-api');
    // dd($api);
    $message = $api->sendPhoneMessage('6289608158049', 'Testing testing');
    dd($message);
    return view('welcome');
});

Route::get('/qrcode', function(){
    return view('qrcode');
});

Route::get('status', function(){
    $api = \App::make('chat-api');
    dd($api->getInbox());
    dd($api->getStatus());
});