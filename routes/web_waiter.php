<?php
//Waiter
Route::get('/waiter/serve', function () {
    return view('waiter.serve');
});
Route::get('waiter/manage_table',function(){
  return view('waiter.manage_table');
});

Route::get('/waiter/serve', 'OrdersController@index');
