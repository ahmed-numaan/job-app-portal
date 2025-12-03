<?php

use Illuminate\Support\Facades\Route;
use Modules\JobsSite\Http\Controllers\HomeController;
use Modules\JobsSite\Http\Controllers\Auth\LoginController;
use Modules\JobsSite\Http\Controllers\Auth\RegisterController;
use Modules\JobsSite\Http\Controllers\Auth\ForgotPasswordController;
use Modules\JobsSite\Http\Controllers\Auth\ResetPasswordController;
use Modules\JobsSite\Http\Controllers\JobsSiteController;
use App\Http\Controllers\ProfileController;

Route::middleware(['web'])->group(function () {

    // Login
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Register
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

    // Forgot & Reset Password
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('jobssites', JobsSiteController::class)->names('jobssite');
});

Route::group([], function () {
    Route::get('/', function () {
        return view('jobssite::welcome');
    });
});

Route::get('/home', [HomeController::class, 'index'])->name('home');