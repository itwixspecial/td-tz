<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatisticController;

Route::prefix('auth')->group(function () {
    require_once "api/auth.php";
});

Route::prefix('manage')->middleware('auth:sanctum')->group(function () {
    require_once "api/roles.php";
});

Route::resource('statistics', StatisticController::class)->middleware('auth:sanctum');