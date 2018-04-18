<?php
//Owner
Route::get('/owner/{id}', function () {
    return view('owner.report');
})->where('id','[0-9]+');