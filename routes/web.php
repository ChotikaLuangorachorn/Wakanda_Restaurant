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



// Customer
Route::get('/customer/{dining_table}', 'customer\MenusController@index')->where('dining_table','[0-9]+');
Route::get('/customer/create', 'customer\MenusController@create');
Route::post('/customer/{dining_table}', 'customer\MenusController@store')->where('dining_table','[0-9]+');

Route::get('/customer/{dining_table}/ordered', 'customer\OrdersController@index')->where('dining_table','[0-9]+');

Route::get('/', function(){
    if(\Auth::user()) {
        if (\Auth::user()->role === 'owner'){
            return redirect('/report');
        }else if (\Auth::user()->role === 'chef'){
            return redirect('/chef/orders');
        }else if (\Auth::user()->role === 'waiter'){
            return redirect('/waiter/serve');
        }
    }
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
