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


Route::get('/index', 'ProductsController@index')->name('index');

Route::get('/add', 'ProductsController@crear')->name('add');

Route::post('/store', 'ProductsController@store')->name('store');


Route::delete('/delete', 'ProductsController@destroy')->name('destroy');


Route::get('/editarlo/{products}', 'ProductsController@edit')->name('edit');

Route::post('/actualizar/{products}', 'ProductsController@update')->name('actualizar');

Route::delete('/delete/{products}', 'ProductsController@destroy')->name('delete');



