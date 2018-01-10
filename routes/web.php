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
    return view('home');
});

Route::get('/about', 'AboutController@index');
Route::get('/services', 'ServicesController@index');
//Route::get('/prices', 'AboutController@index');
//Route::get('/about', 'AboutController@index');
//Route::get('/about', 'AboutController@index');
//Route::get('/about', 'AboutController@index');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
