<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SendEmailController;


Route::get('/', [SendEmailController::class, 'index'])->name('welcome');
Route::post('/', [SendEmailController::class, 'sendEmail'])->name('send-email-template-one');
