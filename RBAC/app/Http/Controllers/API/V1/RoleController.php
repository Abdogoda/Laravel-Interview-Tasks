<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Permissions\AssignPermissionsRequest;
use App\Http\Requests\API\V1\Roles\StoreRoleRequest;
use App\Http\Requests\API\V1\Roles\UpdateRoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return response()->json(RoleResource::collection(Role::all()));
    }

    public function show(Request $request, Role $role)
    {
        return response()->json(RoleResource::make($role->load('permissions')));
    }

    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->validated());
        return response()->json([
            'message' => 'Role created successfully',
            'role' => RoleResource::make($role),
        ], 201);
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->validated());
        return response()->json([
            'message' => 'Role updated successfully',
            'role' => RoleResource::make($role),
        ]);
    }

    public function destroy(Request $request, Role $role)
    {
        $role->delete();
        return response()->json([
            'message' => 'Role deleted successfully',
        ]);
    }

    public function assignPermissions(AssignPermissionsRequest $request, Role $role)
    {
        $permissions = $request->input('permissions', []);
        $role->permissions()->syncWithoutDetaching($permissions);
        return response()->json([
            'message' => 'Permissions assigned successfully',
            'role' => RoleResource::make($role->load('permissions')),
        ]);
    }

    public function removePermissions(AssignPermissionsRequest $request, Role $role)
    {
        $permissions = $request->input('permissions', []);
        $role->permissions()->detach($permissions);
        return response()->json([
            'message' => 'Permissions removed successfully',
            'role' => RoleResource::make($role->load('permissions')),
        ]);
    }
}
