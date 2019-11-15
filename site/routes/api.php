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

Route::post('/register', 'UsersController@register');
Route::post('/login', 'UsersController@login');
Route::get('/logout', 'UsersController@logout');
Route::post('/addcom/{eventId}', 'UsersController@addcom');
Route::get('/like/{eventId}', 'UsersController@like');
Route::get('/registerevent/{eventId}', 'UsersController@registerEvent');
Route::get('/unregisterevent/{eventId}', 'UsersController@unregisterEvent');
Route::post('/uploadfile/{eventId}', 'FileController@upload');
Route::get('/addtobasket/{articleId}', 'UsersController@addToBasket');
Route::get('/removefrombasket/{articleId}', 'UsersController@removeFromBasket');
Route::get('/downloadlist/{eventId}', 'FileController@downloadParticipants');
