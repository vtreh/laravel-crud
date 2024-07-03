<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::controller(ListingController::class)->name('listings.')->prefix('listings')
    ->group(function () {
        Route::middleware(['auth'])->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');

            Route::middleware(['can:edit,listing'])->group(function () {
                Route::get('/{listing}/edit', 'edit')->name('edit');
                Route::put('/{listing}', 'update')->name('update');
                Route::delete('/{listing}', 'destroy')->name('destroy');
            });
        });

        Route::get('/', 'index')->name('index');
        Route::get('/{listing}', 'show')->name('show');
    });


Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisterUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [SessionController::class, 'destroy']);
});
