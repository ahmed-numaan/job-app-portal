<?php

use Illuminate\Support\Facades\Route;
use Modules\JobsSite\Http\Controllers\JobsSiteController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('jobssites', JobsSiteController::class)->names('jobssite');
});
