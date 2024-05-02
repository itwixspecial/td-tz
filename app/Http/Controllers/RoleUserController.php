<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\User;
use App\Http\Requests\AttachRoleRequest;
use Spatie\Permission\Models\Role;

class RoleUserController extends Controller
{
    use AuthorizesRequests;

    public function attachRoleToUser(AttachRoleRequest $request)
    {       
        $this->authorize('attach-role', User::class);

        $userId = $request->input('user_id');
        $roleId = $request->input('role_id');
        $role = Role::findById($roleId, 'web');

        $user = User::findOrFail($userId);
        $user->assignRole($role);

        return response()->json(['message' => 'Role attached to user']);
    }
}
