<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\CreatePermissionRequest;
use App\Http\Requests\AssignPermissionToRoleRequest;


class RolePermissionController extends Controller
{
    public function createRole(CreateRoleRequest $request)
    {
        $role = Role::create(['name' => $request->name]);

        return response()->json(['role' => $role], 201);
    }

    public function createPermission(CreatePermissionRequest $request)
    {
        $permission = Permission::create(['name' => $request->name]);

        return response()->json(['permission' => $permission], 201);
    }

    public function assignPermissionToRole(AssignPermissionToRoleRequest $request)
    {
        $role = Role::findByName($request->role_name);
        $permission = Permission::findByName($request->permission_name);

        $role->givePermissionTo($permission);

        return response()->json(['message' => 'Permission assigned to role'], 200);
    }
}
