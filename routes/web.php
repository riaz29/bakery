<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderlineController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\AccountController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('orderline', OrderlineController::class);
Route::resource('customer', CustomerController::class);
Route::resource('order', OrderController::class);
Route::resource('bill', BillController::class);
Route::resource('account', AccountController::class);
