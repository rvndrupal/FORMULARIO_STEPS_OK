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
Route::get('/indexlog', 'ProductsController@indexlog')->name('indexlog');

Route::get('/add', 'ProductsController@crear')->name('add');

Route::post('/store', 'ProductsController@store')->name('store');


Route::delete('/delete', 'ProductsController@destroy')->name('destroy');


Route::get('/editarlo/{slug_producto}', 'ProductsController@edit')->name('edit');

Route::post('/actualizar/{slug_producto}', 'ProductsController@update')->name('actualizar');

Route::delete('/delete/{slug_producto}', 'ProductsController@destroy')->name('delete');

Route::delete('/permanente/{slug_producto}', 'ProductsController@destroy_permanente')->name('delete_permanente');


Route::get('/recuperar/{slug_producto}', 'ProductsController@restaurar')->name('recuperar');



