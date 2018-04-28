<?php
//Owner
Route::get('/owner/{id}', function () {
    return view('owner.report');
})->where('id','[0-9]+');

//staff
Route::resource('/users' ,'owner\UsersController');

//menu
Route::resource('/menus' ,'owner\MenusController');

//report 
Route::get('report','owner\ReportsController@dailyReport');