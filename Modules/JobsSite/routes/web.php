<?php

use Illuminate\Support\Facades\Route;
use Modules\JobsSite\Http\Controllers\HomeController;
use Modules\JobsSite\Http\Controllers\Auth\LoginController;
use Modules\JobsSite\Http\Controllers\Auth\RegisterController;
use Modules\JobsSite\Http\Controllers\Auth\ForgotPasswordController;
use Modules\JobsSite\Http\Controllers\Auth\ResetPasswordController;
use Modules\JobsSite\Http\Controllers\Auth\VerificationController;
use Modules\JobsSite\Http\Controllers\Auth\ConfirmPasswordController;
use Modules\JobsSite\Http\Controllers\JobsSiteController;
use Modules\JobsSite\Http\Controllers\WelcomeController;
use Modules\JobsSite\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\ProfileController;

Route::middleware(['web'])->group(function () {
    //website pages
    Route::get('/about', [WelcomeController::class, 'about'])->name('about');
    Route::get('/category', [WelcomeController::class, 'category'])->name('category');
    Route::get('/search', [WelcomeController::class, 'search'])->name('search');
    Route::get('/jobslist', [WelcomeController::class, 'jobslist'])->name('jobslist');
    Route::get('/testimonials', [WelcomeController::class, 'testimonials'])->name('testimonials');
    Route::get('/contact', [WelcomeController::class, 'contact'])->name('contact');

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
    Route::middleware('auth')->get('/user/password', function () {
        return view('jobssite::auth.passwords.update');
    });
    

    // Email verification
    Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
    Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');

    // Show confirm password form
    Route::get('confirm-password', [ConfirmPasswordController::class, 'showConfirmForm'])
        ->middleware('auth')
        ->name('password.confirm');

    // Handle password confirmation
    Route::post('confirm-password', [ConfirmPasswordController::class, 'confirm'])->middleware('auth');
        
    Route::put('/user/password', [PasswordController::class, 'update'])->name('password.update_user')->middleware('auth');

});

Route::get('/404', [WelcomeController::class, 'page_not_found'])->name('page_not_found');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('jobssites', JobsSiteController::class)->names('jobssite');
    Route::get('/profile', [WelcomeController::class, 'profile'])->name('profile');
    Route::get('/applications', [WelcomeController::class, 'applications'])->name('applications');
    Route::get('/change_password', [WelcomeController::class, 'change_password'])->name('change_password');
});

Route::group([], function () {
    Route::get('/', function () {
        return view('jobssite::welcome');
    })->name('welcome');
});

