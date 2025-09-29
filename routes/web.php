<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return redirect()->route('hubflix.movies.index');
});

Route::prefix('hubflix')->name('hubflix.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('hubflix.movies.index');
    });
    
    Route::resources([
        'movies' => MovieController::class,
        // 'users' => UserController::class,
    ]);
});
