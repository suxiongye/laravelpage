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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::auth();

Route::get('/', 'AlbumController@index');
Route::get('album/ajax/{id}', 'AlbumController@getPhotosByAlbum');
Route::get('album/{id}', 'AlbumController@show');

Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
    Route::get('/', 'HomeController@index');

    Route::get('album/create', 'AlbumController@create');
    Route::get('album/{id}', 'AlbumController@show');
    Route::get('photo/{id}/create', 'PhotoController@create');
    Route::resource('album', 'AlbumController');
    Route::resource('photo', 'PhotoController');
});
