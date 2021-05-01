<?php

use Illuminate\Support\Facades\Route;

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
    return view('home.home');
})->name('home');

Route::resource('post', 'PostController');

Route::resource('categories', 'CategoryController');

Route::resource('contacts', 'ContactController'); // aca estan los rutamientos para llamar a los metodos

Route::group(['prefix' => 'post'], function () {
    Route::post('search','PostController@search')->name('post.search');
});


