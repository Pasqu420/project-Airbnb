<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/filter','ApiController@filter')->name('filter');
Route::get('/sponsored','ApiController@sponsored')->name('sponsored');
Route::get('/service','ApiController@service')->name('service');
Route::get('/upservice','ApiController@upservice')->name('upservice');
Route::get('/upservice_sponsored','ApiController@upservice_sponsored')->name('upservice_sponsored');

Route::get('/apartment/destroy/{id}', 'ApiController@destroy') -> name('destroy');
Route::get('/views/{id}', 'ApiController@getViews') -> name('get_views');
Route::get('/messages/{id}', 'ApiController@getMessages') -> name('get_messages');

