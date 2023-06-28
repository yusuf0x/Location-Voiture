<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Request;
// use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,"index"]);
Route::get('/cars', [CarsController::class,"index"]);
Route::post('/cars', [CarsController::class,"filter"]);
Route::post('/checkout', [CheckOutController::class,"index"]);
Route::post('/confirm', [CheckOutController::class,"confirm"]);
Route::get('/confirmation', [ConfirmationController::class,"confirmation"]);
Route::get('/login', [AuthController::class,"login_view"]);
Route::post('/login', [AuthController::class,"login"]);
Route::get('/register', [AuthController::class,"register_view"]);
Route::post('/register', [AuthController::class,"register"]);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/reservation/verify/{token}', [CheckOutController::class, 'verify'])->name('reservation.verify');
Route::view('/reservation/success', 'reservation.success')->name('reservation.success');
Route::get('/reservation/status/{reservation}', [CheckOutController::class, 'status'])
    ->name('reservation.status');

 
Route::get('/locale/{locale}', function (Request $request, $locale) {
    Session::put('locale', $locale);
    return redirect()->back();
})->name('locale');

Route::get('currency/change/{currency}', function ($currency) {
    session(['currency' => $currency]);
    return redirect()->back();
})->name('currency.change');

Route::get('/currency/{currency}', [CurrencyController::class,'changeCurrency'])->name('changeCurrency');

Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});

