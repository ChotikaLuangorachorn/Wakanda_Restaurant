<?php
//Chef

//Route::resource('/orders', 'chef\OrdersController@index');
Route::get('/orders', 'chef\OrdersController@index');
Route::get('/orders/{order}', 'chef\OrdersController@show')
->where('order', '[0-9]+');
Route::get('/orders/create', 'chef\OrdersController@create');
Route::post('/orders', 'chef\OrdersController@store');
Route::get('/orders/{order}/edit', 'chef\OrdersController@edit')
->where('order', '[0-9]+');
Route::put('/orders/{order}', 'chef\OrdersController@update')
->where('order', '[0-9]+');
Route::delete('/orders/{order}', 'chef\OrdersController@destroy');


// Route::get('/chef/{id}', function () {
//     return view('chef.order');
// })->where('id','[0-9]+');

