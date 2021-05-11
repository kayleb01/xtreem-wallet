<?php

use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\VerifyEmailController;

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

Route::get('/', [LoginController::class, 'show']);
Route::get('/home', [LoginController::class, 'show']);

Route::get('/login', [LoginController::class, 'show']);
Route::get('/dashboard', [DashboardController::class, 'show']);
Route::get('/register', [RegisterController::class, 'index']);
Route::get('/transactions', [TransactionController::class, 'transactions']);
Route::get('/settings', [SettingController::class, 'index']);
Route::get('/pay', [SettingController::class, 'pay']);




Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, 'verify'])->middleware(['signed'])->name('verification.verify');
