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

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){

    Route::get('details', 'API\UserController@details');

    Route::get('articles', 'API\ArticleController@index');
    Route::get('articles/{id}', 'API\ArticleController@show');
    Route::post('articles', 'API\ArticleController@store');
    Route::put('articles/{id}', 'API\ArticleController@update');
    Route::delete('articles/{id}', 'API\ArticleController@delete');
});
