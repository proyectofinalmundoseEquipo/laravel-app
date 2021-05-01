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

Route::group(['prefix' => 'category'], function () {
    Route::get('list', 'categoryController@list');
    Route::post('create', 'categoryController@save');
});

Route::group(['prefix' => 'contact'], function () {
    Route::get('list', 'contactController@list');
    Route::post('create', 'contactController@save');
    Route::post('store', 'ContactController@store');
});

Route:: group(['prefix'  => 'post'],function(){
    Route::get('list', 'postController@list');
});



//http://localhost:8000/api/category/create
//http://localhost:8000/api/contact/create

