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
    Route::get('/certificates', 'AboutController@certificates');
    Route::get('/prices', 'AboutController@prices');
    Route::get('/lechim', 'NewsController@index');
    Route::get('/contacts', 'AboutController@contacts');
    Route::resource('catalog', 'CatalogController');
    Route::get('news', 'NewsController@all')->name('articles');
    Route::resource('news', 'NewsController', [
        'except' => [
            'index'
    ]]);

    Route::resource('question', 'QuestionController');

    //Rating and Reviews
    Route::post('/saverating', 'RatingReviewController@addRating')->name('saverating');
    Route::post('/savereview', 'RatingReviewController@addReview')->name('savereview');
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Voyager::routes();

    Route::resource('test', 'AdminPagesCustomController', [
        'as' => 'voyager'
    ]);
    Route::post('/savepage', 'AdminPagesCustomController@savePage')->name('voyager.savepage');

    Route::resource('about', 'AdminAboutController', [
        'as' => 'voyager'
    ]);

    Route::resource('prices', 'AdminPricesController', [
        'as' => 'voyager'
    ]);

    Route::resource('pricestypes', 'Admin\PricesTypesController', [
        'as' => 'voyager'
    ]);

    Route::resource('guestbook', 'Admin\AdminGuestbookController', [
        'as' => 'voyager'
    ]);

    Route::resource('home', 'AdminHomeController', [
        'as' => 'voyager'
    ], ['only' => ['index', 'store']]);

    Route::resource('services', 'AdminMainServicesController', [
        'as' => 'voyager'
    ], ['only' => ['index', 'store']]);

    Route::resource('services-news', 'AdminMainServicesController', [
        'as' => 'voyager'
    ], ['only' => ['index', 'store']]);

    Route::resource('doctor', 'AdminDoctorsController', [
        'as' => 'voyager'
    ]);

    Route::resource('contacts', 'Admin\ContactsController', [
        'as' => 'voyager'
    ]);

    Route::resource('profilaktor', 'Admin\QuestionController', [
        'as' => 'voyager'
    ]);

    Route::resource('certificates', 'Admin\AdminCertificatesController', [
        'as' => 'voyager'
    ]);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
