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

Route::get('/', 'IndexController@index');
Route::get('/campus', 'IndexController@campus');
Route::get('/shop', 'IndexController@shop');
Route::get('/events', 'IndexController@events');
Route::get('/signup', 'IndexController@signup');
Route::get('/basket', 'IndexController@basket');
Route::get('/events/{id}', 'IndexController@eventype');
Route::get('/mentions', 'IndexController@mentions');
