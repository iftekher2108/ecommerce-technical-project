<?php

use Illuminate\Support\Facades\Route;
use Shop\Store\Http\Controllers\StoreController;

Route::get('/', function () {
    return view('welcome');
});

// Route::controller(StoreController::class)->group(function() {
//     Route::get('/','index');
// });
