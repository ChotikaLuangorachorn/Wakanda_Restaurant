<?php
//Waiter
Route::get('/waiter/serve', function () {
    return view('waiter.serve');
});
Route::get('waiter/manageTable',function(){
  return view('waiter.manageTable');
});

Route::get('/waiter/serve', 'waiter\OrdersController@index');
Route::post('/waiter/serve', 'waiter\OrdersController@update');
Route::get('/waiter/manageTable', 'waiter\DiningTablesController@index');
Route::post('/waiter/manageTable', 'waiter\DiningTablesController@update');
