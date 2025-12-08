<?php

use Illuminate\Support\Facades\Route;
use Modules\AdminSite\Http\Controllers\AdminSiteController;
use Modules\AdminSite\Http\Controllers\Auth\LoginController;
use Modules\AdminSite\Http\Controllers\UserController;
use Modules\AdminSite\Http\Controllers\CompanyController;
use Modules\AdminSite\Http\Controllers\SkillController;

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

    Route::get('/admin/companies', [CompanyController::class, 'list'])->name('admin.companies.list');
    Route::get('/admin/companies/data', [CompanyController::class, 'datatable'])->name('admin.companies.data');
    Route::post('/admin/companies', [CompanyController::class, 'store'])->name('admin.companies.store');
    Route::get('/admin/companies/{id}', [CompanyController::class, 'show'])->name('admin.companies.show');
    Route::put('/admin/companies/{id}', [CompanyController::class, 'update'])->name('admin.companies.update');
    Route::delete('/admin/companies/{id}', [CompanyController::class, 'destroy'])->name('admin.companies.destroy');

    Route::get('admin/skills', [SkillController::class, 'list'])->name('admin.skills.list');
    Route::get('admin/skills/data', [SkillController::class, 'data'])->name('admin.skills.data');
    Route::post('admin/skills', [SkillController::class, 'store'])->name('admin.skills.store');
    Route::get('admin/skills/{id}', [SkillController::class, 'show'])->name('admin.skills.show');
    Route::put('admin/skills/{id}', [SkillController::class, 'update'])->name('admin.skills.update');
    Route::delete('admin/skills/{id}', [SkillController::class, 'destroy'])->name('admin.skills.delete');

    Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
});