<?php
//Chef
Route::get('/chef/{id}', function () {
    return view('chef.order');
})->where('id','[0-9]+');