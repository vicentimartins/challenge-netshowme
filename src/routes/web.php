<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

Route::middleware(['intercept_ip'])->group(function () {
    Route::get('/', [EmailController::class, 'index'])
        ->name('email-home');
    Route::post(
        '/send-email',
        [EmailController::class, 'sendEmail']
    )->name('send-email');
});
