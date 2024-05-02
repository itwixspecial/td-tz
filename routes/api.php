<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\RoleUserController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::post('/roles', [RolePermissionController::class, 'createRole'])->middleware('auth:sanctum');
Route::post('/permissions', [RolePermissionController::class, 'createPermission'])->middleware('auth:sanctum');
Route::post('/assign-permission-to-role', [RolePermissionController::class, 'assignPermissionToRole'])->middleware('auth:sanctum');

Route::post('/attach-role', [RoleUserController::class, 'attachRoleToUser'])->middleware('auth:sanctum');

Route::resource('statistics', StatisticController::class)->middleware('auth:sanctum');