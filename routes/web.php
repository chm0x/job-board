<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OfferedJobController;

// Route::get('/', function () {
//     return view('welcome');
// });

# MAIN
Route::get('', fn() => to_route('jobs.index'));

# RESOURCE: OFFERED JOBS
Route::resource('jobs', OfferedJobController::class)
    ->only(['index', 'show']);