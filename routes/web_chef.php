<?php
//Chef
Route::get('/chefs/{id}', function () {
    return view('chefs.order');
})->where('id','[0-9]+');