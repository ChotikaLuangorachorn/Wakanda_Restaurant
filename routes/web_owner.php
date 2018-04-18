<?php
//Owner
Route::get('/owners/{id}', function () {
    return view('owners.report');
})->where('id','[0-9]+');