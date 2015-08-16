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


// get
Route::get('/', 'ArticlesController@index');
Route::get('articles/index', 'ArticlesController@index');
Route::get('articles/show/{id}', 'ArticlesController@show');
Route::get('articles/edit/{id}', 'ArticlesController@edit');
Route::get('articles/destroy/{id}', 'ArticlesController@destroy');

// post
Route::post('articles/store', 'ArticlesController@store');
Route::post('articles/update/{id}', 'ArticlesController@update');

// resource
Route::resource('articles', 'ArticlesController');

Route::get('fire', function () {
    // this fires the event
    event(new App\Events\ArticleCreated());
    return "event fired";
});

Route::get('test', function () {
    // this checks for the event
    return view('article/test');
});
