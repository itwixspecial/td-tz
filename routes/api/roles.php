<?php

use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\RolePermissionController;
use Illuminate\Support\Facades\Route;

Route::post('/roles', [RolePermissionController::class, 'createRole'])->middleware('auth:sanctum');
Route::post('/permissions', [RolePermissionController::class, 'createPermission'])->middleware('auth:sanctum');
Route::post('/assign-permission-to-role', [RolePermissionController::class, 'assignPermissionToRole'])->middleware('auth:sanctum');
Route::post('/attach-role', [RoleUserController::class, 'attachRoleToUser'])->middleware('auth:sanctum');
