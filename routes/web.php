<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilesController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->controller(FilesController::class)->group(function () {
    Route::get('/Info','index')->name('Files.index');
    Route::get('/Info/create','create')->name('Files.create');
    Route::get('/Info/{id}', 'show')->name('Files.show');
    Route::post('/Info', 'store')->name('Files.store');
    Route::delete('/Info/{file}','destroy')->name('Files.destroy');
});