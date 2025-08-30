<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RumahSakitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm']);
    Route::post('/login', [AuthController::class, 'login']);
});


Route::middleware('auth')->group(function () {
    Route::resource('rumah-sakit', RumahSakitController::class);
    Route::get('rumah-sakit-view', [RumahSakitController::class, "view"]);
    Route::resource('pasien', PasienController::class);
    Route::get('pasien-view', [PasienController::class, "view"]);

    Route::post('/logout', [AuthController::class, 'logout']);
});
