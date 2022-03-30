<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customerController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [homeController::class, "index"]);

Route::get('/client', function () {
    return view('client');
});
Route::resource('customer', customerController::class);
Route::resource('contact',contactController::class);
// Route::get('/client', function () {
//     return view('client');
// });

Route::post("login", [loginController::class, "authenticate"])->name('login');

Route::resource('customer', customerController::class);
