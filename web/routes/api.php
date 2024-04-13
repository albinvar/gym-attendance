<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Routes for POS Machine API
Route::middleware('auth:sanctum')->group(function () {
    // Check if the POS machine is operational
    Route::get('/pos', 'App\Http\Controllers\PosMachineController@checkIfOperational');

    // Balance Inquiry
    Route::get('/balance', 'App\Http\Controllers\PosMachineController@balanceInquiry');

    // Get user from rfid tag
    Route::post('/card', 'App\Http\Controllers\PosMachineController@getUserFromRfid');

    // Validate pin
    Route::post('/pin', 'App\Http\Controllers\PosMachineController@validatePin');

    // Create a new transaction
    Route::post('/transaction', 'App\Http\Controllers\PosMachineController@createTransaction');

});
