<?php

use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\RolePermissionController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/roles', [RolePermissionController::class, 'createRole']);
    Route::post('/permissions', [RolePermissionController::class, 'createPermission']);
    Route::post('/assign-permission-to-role', [RolePermissionController::class, 'assignPermissionToRole']);
    Route::post('/attach-role', [RoleUserController::class, 'attachRoleToUser']);
});
