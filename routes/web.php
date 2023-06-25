<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,"index"]);
Route::get('/cars', [CarsController::class,"index"]);
Route::post('/cars', [CarsController::class,"filter"]);
Route::post('/checkout', [CheckOutController::class,"index"]);
Route::post('/confirm', [CheckOutController::class,"confirm"]);
Route::get('/login', [AuthController::class,"login_view"]);
Route::post('/login', [AuthController::class,"login"]);
Route::get('/register', [AuthController::class,"register_view"]);
Route::post('/register', [AuthController::class,"register"]);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});


