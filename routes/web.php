<?php

use App\Models\Payment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Payments\PaymentsController;




Route::get('/login/{package_id?}', [LoginController::class, 'login'])->middleware('guest');
Route::post('/login', [LoginController::class, 'store'])->name('login')->middleware('guest');
Route::get('/register', [RegisterController::class, 'register'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register')->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');


Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/works', [IndexController::class, 'workpage'])->name('works.index');
Route::get('/contact', [IndexController::class, 'contactpage'])->name('contact.index');
Route::get('/our-service', [IndexController::class, 'showServicesPricing'])->name('service.index');




Route::resource('services', ServiceController::class);


Route::middleware('auth')->prefix('/payments')->group(function () {
    Route::get('/{appointment}', [PaymentsController::class, 'index'])
        ->name('payments.index');
    Route::post('/process-payment', [PaymentsController::class, 'processPayment'])
        ->name('process.payment');
    Route::post('/payment/success', [PaymentsController::class, 'paymentSuccess'])
        ->name('payment.success');
    Route::get('/payment/success', [PaymentsController::class, 'showSuccessPage'])
        ->name('payment.success.redirect');
    Route::post('/payment/failure', [PaymentsController::class, 'paymentFailure'])
        ->name('payment.failure');
});


Route::middleware('auth')->group(function () {
    Route::get('/appointments/details/{package}', [AppointmentController::class, 'showAppointmentForm'])->name('appointments.create');
    Route::get('/appointments/times', [AppointmentController::class, 'getAvailableTimes'])->name('appointments.times');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.book');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/appointments', [DashboardController::class, 'appointments'])->name('dashboard.appointments');
    Route::get('/dashboard/payments', [DashboardController::class, 'payments'])->name('dashboard.payments');
    Route::get('/dashboard/cars', [DashboardController::class, 'cars'])->name('dashboard.cars');
});
