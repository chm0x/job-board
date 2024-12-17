<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OfferedJobController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('jobs', OfferedJobController::class)
    ->only(['index']);