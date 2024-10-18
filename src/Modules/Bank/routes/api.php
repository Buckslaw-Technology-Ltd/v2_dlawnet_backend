<?php

use Illuminate\Support\Facades\Route;
use Modules\Bank\App\Http\Controllers\BankController;
use Modules\Bank\App\Http\Controllers\TopUpController;

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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/activate', [BankController::class,'activateAccount'])->name('activate-account');
    Route::get('/transactions/pending', [BankController::class,'getAllPendingTransactions'])
        ->name('get-all-pending-transactions');
    Route::get('/transactions/completed', [BankController::class,'getAllCompletedTransactions'])
        ->name('get-all-completed-transactions');
    Route::get('/transactions', [BankController::class,'getAllTransactions'])
        ->name('get-all-transactions');
    Route::get('/transactions/verify/{id}', [BankController::class,'verifyTransaction'])->name('verify-transactions');
    Route::get('/transactions/get-receipt/{reference_number}', [BankController::class,'getReceipt'])
        ->name('get-receipt');
    Route::post('/transactions/upload-proof', [BankController::class,'uploadProofPayment'])
        ->name('upload-proof');


    // get the top-ups
    Route::get('top-ups',[TopUpController::class,'index'])->name('top-ups');

    // find one top-up
    Route::get('top-up/{top_up}',[TopUpController::class,'show'])->name('top-up');

    // Admin Create Top up
    Route::post('top-up',[TopUpController::class,'create'])->name('create-top-up');


    // Admin Update Top up
    Route::put('top-up/{id}',[TopUpController::class,'update'])->name('top-up-update');

    // Admin Delete Top up
    Route::delete('top-up/{top_up}',[TopUpController::class,'destroy'])->name('top-up-delete');

    Route::post('top-up/{top_up}/activate',[TopUpController::class,'activate'])->name('top-up-activate');

    Route::post('top-up/{top_up}/deactivate',[TopUpController::class,'deactivate'])->name('top-up-deactivate');

});
