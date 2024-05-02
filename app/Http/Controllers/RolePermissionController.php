<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\CreatePermissionRequest;
use App\Http\Requests\AssignPermissionToRoleRequest;
use Illuminate\Http\JsonResponse;

class RolePermissionController extends Controller
{
    public function createRole(CreateRoleRequest $request): JsonResponse
    {
        $role = Role::create(['name' => $request->name]);

        return response()->json(['role' => $role], 201);
    }

    public function createPermission(CreatePermissionRequest $request): JsonResponse
    {
        $permission = Permission::create(['name' => $request->name]);

        return response()->json(['permission' => $permission], 201);
    }

    public function assignPermissionToRole(AssignPermissionToRoleRequest $request): JsonResponse
    {
        $role = Role::findByName($request->role_name);
        $permission = Permission::findByName($request->permission_name);

        $role->givePermissionTo($permission);

        return response()->json(['message' => 'Permission assigned to role'], 200);
    }
}
