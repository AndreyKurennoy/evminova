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
//Route::get('/services', 'ServicesController@index');
//Route::get('/prices', 'AboutController@index');
//Route::get('/about', 'AboutController@index');
//Route::get('/about', 'AboutController@index');
Route::get('/catalog', 'CatalogController@index');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

//    Route::get('pages/{pages}', 'AdminPagesCustomController@index');
    // Можно переопределить все вьюхи для страниц pages и кастомизировать для связи с базой и самостоятельного создания страничек
    //добавить в таблицу "урл" или как реализовать?
//    Route::resource('pages', 'AdminPagesCustomController', ['only' => [
//         'edit'
//    ]]);
//    Route::get('pages/{page}/edit', ['uses' => 'AdminPagesCustomController@edit', 'as' => 'voyager.pages.edit']);
//    Route::get('pages/create', ['uses' => 'AdminPagesCustomController@create', 'as' => 'voyager.pages.create']);
    Route::resource('test', 'AdminPagesCustomController', [
        'as' => 'voyager'
    ]);
});
