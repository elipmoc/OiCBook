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


Route::get('/', 'LoginController@show');
Route::get('/oauth', 'LoginController@oauth');
Route::get('/oauth_callback', 'LoginController@oauth_callback');
Route::get('/show_oauth', 'LoginController@show_oauth');
