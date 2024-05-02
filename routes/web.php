<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('pages.home.index');
})->name('home.index');

Route:: as('auth.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route:: as ('login.')->group(function () {
            Route::get('/login', [LoginController::class, 'create'])->name('create');
            Route::post('/login', [LoginController::class, 'store'])->name('store');
        });

        Route:: as ('register.')->group(function () {
            Route::get('/register', [RegisterController::class, 'create'])->name('create');
            Route::post('/register', [RegisterController::class, 'store'])->name('store');
        });
    });

    Route::middleware('auth')->group(function () {
        Route::get('/logout', [LoginController::class, 'destroy'])->name('destroy');
    });
});