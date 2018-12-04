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

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'saturday']], function () {
    Route::resource('/books', 'BooksController');
    //Route::get('/books', 'BooksController@index')->name('books.index');
    //Route::post('/books', 'BooksController@store')->name('books.store');
    Route::get('/books/{book}/destroy', 'BooksController@destroy')->name('books.destroyshort');
});

Route::post('/book', 'BooksController@storeJson');