<?php

use Illuminate\Support\Facades\Route;
use Modules\AdminSite\Http\Controllers\AdminSiteController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('adminsites', AdminSiteController::class)->names('adminsite');
});
