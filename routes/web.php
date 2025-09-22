<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect('/hubflix');
});

Route::prefix('hubflix')->name('hubflix.')->group(function () {
    
    Route::prefix('roles')->name('users.')->group(function () {
        Route::get('/', [RoleController::class, "index"])->name('roles');
        Route::get('/{role}', [RoleController::class, "show"])->name('role');
    });
    
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', [CategoryController::class, "index"])->name('categories');
        Route::get('/{category}', [CategoryController::class, "show"])->name('category');
    });

    Route::resources([
        'movies' => MovieController::class,
        'users' => UserController::class,
    ]);
});
