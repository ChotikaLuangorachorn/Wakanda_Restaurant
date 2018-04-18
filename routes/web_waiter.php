<?php
//Waiter
Route::get('/waiter/{id}', function () {
    return view('waiter.serve_wait_order');
})->where('id','[0-9]+');