<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Manage Users Admin Routes
    Route::get('/users', [AdminController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/attendance', [AdminController::class, 'showAttendance'])->name('admin.users.attendance');

    Route::put('/users/{user}', [AdminController::class, 'update'])->name('admin.users.update');

    // User Attendance Routes
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');

    Route::get('/payment/gateway', [PaymentController::class, 'showPaymentGateway'])->name('payment.gateway');
    Route::post('/payment/gateway', [PaymentController::class, 'handleGatewayResponse'])->name('payment.gateway.response');

    Route::get('/invoice/{id}', [PaymentController::class, 'showInvoice'])->name('invoice.show');
});
