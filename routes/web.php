<?php

use Illuminate\Support\Facades\Route;

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
    return view('dashboard.pages.index');
})->name('index');


Route::get('/users','UserController@index')->name('users.index');
Route::get('/user/{id}','UserController@sendMail')->name('users.send-mail');
Route::get('/orders','OrderController@index')->name('orders.index');
Route::post('/orders','OrderController@import')->name('orders.import');
Route::get('/orders/{id}','OrderController@edit')->name('orders.edit');
Route::post('/orders/{id}','OrderController@update')->name('orders.update');
Route::get('/orders/delete/{id}','OrderController@delete')->name('orders.delete');
