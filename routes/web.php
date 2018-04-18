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

// Route::get('/master', function () {
//     return view('layouts.master');
// });

// Customer
Route::get('/customer/{id}', 'customer\OrdersController@index')->where('id','[0-9]+');

// //Chef
// Route::get('/chefs/{id}', function () {
//     return view('chefs.order');
// })->where('id','[0-9]+');
// //Waiter
// Route::get('/waiters/{id}', function () {
//     return view('waiters.serve_wait_order');
// })->where('id','[0-9]+');
// //Owner
// Route::get('/owners/{id}', function () {
//     return view('owners.report');
// })->where('id','[0-9]+');
// //Home
// Route::get('/home', function () {
//     return view('homes.main');
// });

// include("web_test.php");