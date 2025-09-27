<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect('/hubflix/movies');
});

Route::prefix('hubflix')->name('hubflix.')->group(function () {
    Route::resources([
        'movies' => MovieController::class,
        'users' => UserController::class,
    ]);
});
