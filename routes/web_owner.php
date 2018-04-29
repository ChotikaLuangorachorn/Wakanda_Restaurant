<?php
//Owner


//staff
Route::resource('/users' ,'owner\UsersController');

//menu
Route::resource('/menus' ,'owner\MenusController');

//report 
Route::get('report','owner\ReportsController@allReport');
Route::post('report','owner\ReportsController@dailyReport');
