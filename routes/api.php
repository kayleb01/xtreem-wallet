<?php


use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FlutterwaveController;
use App\Http\Controllers\TransactionController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::get('currencies', [CurrencyController::class, 'index']);
    Route::get('currency/{id}', [CurrencyController::class, 'show']);
    Route::post('currency/store', [CurrencyController::class, 'store']);
    Route::put('currency/{currency}/edit', [CurrencyController::class, 'update']);
    Route::delete('currency/{currency}/destroy', [CurrencyController::class, 'destroy']);

    Route::get('wallet',[WalletController::class, 'index']);
    Route::post('wallet/store', [WalletController::class, 'store'])->name('wallet/store');

    Route::get('transactions',[TransactionController::class, 'index']);
    Route::get('transaction/{id}', [TransactionController::class, 'show']);
    Route::post('transaction/store', [TransactionController::class, 'store']);
    Route::put('transaction/{transaction}/edit', [TransactionController::class, 'update']);

    Route::get('roles', [RolesController::class, 'index']);
    Route::post('role/store', [RolesController::class, 'store']);
    Route::delete('role/{role}/destroy', [RolesController::class, 'destroy']);

    // The route that the button calls to initialize payment
    Route::post('/pay', [FlutterwaveController::class, 'initialize'])->name('pay');
    // The callback url after a payment
    Route::get('/rave/callback', [FlutterwaveController::class, 'callback'])->name('callback');

});

Route::post('login', [LoginController::class, 'index']);

