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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/upload', 'UploadController@index')->name('upload');
// Route::post('upload', 'UploadController@upload');
Route::post('upload',['as'=>'image.upload','uses'=>'UploadController@upload']);
Route::get('/albums', 'AlbumsController@index')->name('albums');
Route::post('createAlbum', 'AlbumsController@create');
Route::delete('/home/{id}', 'UploadController@destroy')->name('delete');
Route::get('/home/{id}', 'UploadController@edit')->name('edit');
Route::put('/home/{id}', 'UploadController@update')->name('update');
