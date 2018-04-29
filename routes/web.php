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
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return view('welcome');
});

// Customer
Route::get('/customer/{dining_table}', 'customer\MenusController@index')->where('dining_table','[0-9]+');
Route::get('/customer/create', 'customer\MenusController@create');
Route::post('/customer/{dining_table}', 'customer\MenusController@store')->where('dining_table','[0-9]+');

Route::get('/customer/{dining_table}/ordered', 'customer\OrdersController@index')->where('dining_table','[0-9]+');
