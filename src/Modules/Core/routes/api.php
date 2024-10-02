<?php

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

use Modules\Core\App\Http\Controllers\AuthController;

Route::get('/', function () {
    return 'Proceed to the documentation';
});
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', 'AuthController@login')->name('login');
    Route::post('/password-reset', 'AuthController@createPasswordReset')->name('password-reset');
    Route::post('/complete-password-reset', 'AuthController@completeResetPassword')->name('complete-password-reset');
    Route::middleware('auth:sanctum')->get('/suspendAccount/{user_id}', 'AuthController@suspendAccount')->name('suspend-account');
    Route::middleware('auth:sanctum')->post('/logout', 'AuthController@logout')->name('log-out');
    Route::middleware('auth:sanctum')->post('/logOutFromAllDevices', 'AuthController@logOutFromAllDevices')->name('log-out-from-all-devices');
    Route::post('/verify', 'AuthController@verify')->name('verify');
    Route::get('/me', 'AuthController@me')->name('me');
});
Route::get('/core/get-countries', 'CoreController@getCountries')->name('getCountries');
Route::get('/core/get-states/{country}', 'CoreController@getStates')->name('getStates');
