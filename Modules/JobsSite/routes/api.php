<?php

use Illuminate\Support\Facades\Route;
use Modules\JobsSite\Http\Controllers\JobsSiteController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('jobssites', JobsSiteController::class)->names('jobssite');
});
