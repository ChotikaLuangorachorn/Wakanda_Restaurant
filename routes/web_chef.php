<?php
//Chef

//Route::resource('/orders', 'chef\OrdersController@index');
Route::get('chef/orders/{orderby?}/{w?}', 'chef\OrdersController@index')
->where('orderby', '[a-zA-Z_]+')->where('w', 'desc');

// Route::get('chef/orders/{order}', 'chef\OrdersController@show')
// ->where('order', '[0-9]+');
// Route::get('chef/orders/create', 'chef\OrdersController@create');
 Route::post('chef/orders', 'chef\OrdersController@store');
// Route::get('chef/orders/{order}/edit', 'chef\OrdersController@edit')
// ->where('order', '[0-9]+');
// Route::put('chef/orders/{order}', 'chef\OrdersController@update')
// ->where('order', '[0-9]+');
// Route::delete('chef/orders/{order}', 'chef\OrdersController@destroy');

Route::get('chef/doneOrders', 'chef\DoneOrdersController@index');

Route::get('chef/menus/{categoryNo}', 'chef\MenusController@index')
->where('categoryNo', '[0-9]+');
Route::get('chef/menus/{menu}', 'chef\MenusController@show')
->where('menu', '[0-9]+');

Route::put('/chef/menus/{categoryNo}', 'chef\MenusController@update')
->where('categoryNo', '[0-9]+');

// Route::get('/chef/{id}', function () {
//     return view('chef.order');
// })->where('id','[0-9]+');

