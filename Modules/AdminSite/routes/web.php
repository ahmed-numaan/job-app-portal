<?php

use Illuminate\Support\Facades\Route;
use Modules\AdminSite\Http\Controllers\AdminSiteController;
use Modules\AdminSite\Http\Controllers\Auth\LoginController;
use Modules\AdminSite\Http\Controllers\UserController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('adminsites', AdminSiteController::class)->names('adminsite');
});

// Admin Login
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.submit');

// Protected Admin Area
Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('adminsite::dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/users', [UserController::class, 'list'])->name('admin.users.list');
    Route::get('/admin/users/data', [UserController::class, 'datatable'])->name('admin.users.data');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{id}', [UserController::class, 'show'])->name('admin.users.show');
    Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.delete');

    Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
});