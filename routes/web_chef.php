<?php
//Chef

//Route::resource('/orders', 'chef\OrdersController@index');
Route::get('chef/orders', 'chef\OrdersController@index');
Route::get('chef/orders/{order}', 'chef\OrdersController@show')
->where('order', '[0-9]+');
Route::get('chef/orders/create', 'chef\OrdersController@create');
Route::post('chef/orders', 'chef\OrdersController@store');
Route::get('chef/orders/{order}/edit', 'chef\OrdersController@edit')
->where('order', '[0-9]+');
Route::put('chef/orders/{order}', 'chef\OrdersController@update')
->where('order', '[0-9]+');
Route::delete('chef/orders/{order}', 'chef\OrdersController@destroy');


// Route::get('/chef/{id}', function () {
//     return view('chef.order');
// })->where('id','[0-9]+');

