<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('index');
// });
// Route::resource('items', 'ItemController',
//     ['except' => ['create', 'edit']]);
//
// Route::get('/photos', function () {
//   return view('photo.index');
// });
// Route::resource('photos','PhotosController');
Route::get('photos', 'PhotosController@index');
Route::post('photos/uploadFiles', 'PhotosController@uploadFiles');

Route::get('photos/created', function () {
    // this fires the event
    event(new App\Events\PhotoCreated());
    return "event fired";
});



// get
Route::get('/', 'ArticlesController@index');
Route::get('articles/index', 'ArticlesController@index');
Route::get('articles/show/{id}', 'ArticlesController@show');
Route::get('articles/edit/{id}', 'ArticlesController@edit');
Route::get('articles/destroy/{id}', 'ArticlesController@destroy');
Route::get('articles/draft', 'ArticlesController@draft');

// post
Route::post('articles/store', 'ArticlesController@store');
Route::post('articles/update/{id}', 'ArticlesController@update');
Route::post('articles/draft', function()
{
    return 'Success! ajax in laravel 5';
});

// resource
Route::resource('articles', 'ArticlesController');


//
// Route::get('fire', function () {
//     // this fires the event
//     event(new App\Events\ArticleCreated());
//     return "event fired";
// });

Route::get('test', function () {
    // this checks for the event
    return view('article/test');
});



Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
