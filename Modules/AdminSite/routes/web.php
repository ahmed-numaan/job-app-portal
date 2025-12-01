<?php

use Illuminate\Support\Facades\Route;
use Modules\AdminSite\Http\Controllers\AdminSiteController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('adminsites', AdminSiteController::class)->names('adminsite');
});
