<?php
//Waiter
Route::get('/waiters/{id}', function () {
    return view('waiters.serve_wait_order');
})->where('id','[0-9]+');