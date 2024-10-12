<?php

use Illuminate\Support\Facades\Route;

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
    Route::get('/activate', 'BankController@activateAccount')->name('activate-account');
    Route::get('/transactions/pending', 'BankController@getAllPendingTransactions')->name('get-all-pending-transactions');
    Route::get('/transactions/completed', 'BankController@getAllCompletedTransactions')->name('get-all-completed-transactions');
    Route::get('/transactions', 'BankController@getAllTransactions')->name('get-all-transactions');
    Route::get('/transactions/verify/{id}', 'BankController@verifyTransaction')->name('verify-transactions');
    Route::get('/transactions/get-reciept/{reference_number}', 'BankController@getReciept')->name('get-receipt');
    Route::post('/transactions/upload-proof', 'BankController@uploadProofPayment')->name('upload-proof');
});
