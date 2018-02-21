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

Route::group(['middleware' => 'auth'], function(){
//    Route::get('/', function () {
//        return view('home');
//    });
    Route::get('/', 'HomeController@index');

    Route::get('/about', 'AboutController@about');
    Route::get('/about/doctors', 'AboutController@doctors');
    Route::get('/guestbook', 'AboutController@guestbook');
//Route::get('/services', 'ServicesController@index');
//Route::get('/prices', 'AboutController@index');
//Route::get('/about', 'AboutController@index');
//Route::get('/about', 'AboutController@index');
    Route::resource('catalog', 'CatalogController');


});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::resource('test', 'AdminPagesCustomController', [
        'as' => 'voyager'
    ]);

    Route::resource('about', 'AdminAboutController', [
        'as' => 'voyager'
    ]);

    Route::resource('prices', 'AdminPricesController', [
        'as' => 'voyager'
    ]);

    Route::resource('guestbook', 'AdminGuestbookController', [
        'as' => 'voyager'
    ]);

    Route::resource('home', 'AdminHomeController', [
        'as' => 'voyager'
    ], ['only' => ['index', 'store']]);

    Route::resource('services', 'AdminMainServicesController', [
        'as' => 'voyager'
    ], ['only' => ['index', 'store']]);

    Route::resource('doctor', 'AdminDoctorsController', [
        'as' => 'voyager'
    ]);


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
