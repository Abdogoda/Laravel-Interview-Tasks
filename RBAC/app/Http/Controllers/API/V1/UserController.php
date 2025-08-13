<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Permissions\AssignPermissionsRequest;
use App\Http\Requests\API\V1\Users\StoreUserRequest;
use App\Http\Requests\API\V1\Users\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Assign;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(UserResource::collection(User::all()));
    }

    public function show(Request $request, User $user)
    {
        return response()->json(UserResource::make($user));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());
        return response()->json([
            'message' => 'User created successfully',
            'user' => UserResource::make($user),
        ], 201);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        return response()->json([
            'message' => 'User updated successfully',
            'user' => UserResource::make($user),
        ]);
    }

    public function destroy(Request $request, User $user)
    {
        $user->delete();
        return response()->json([
            'message' => 'User deleted successfully',
        ]);
    }

    public function assignPermissions(AssignPermissionsRequest $request, User $user)
    {
        $permissions = $request->input('permissions', []);
        $user->permissions()->syncWithoutDetaching($permissions);
        return response()->json([
            'message' => 'Permissions assigned successfully',
            'user' => UserResource::make($user->load('permissions')),
        ]);
    }

    public function removePermissions(AssignPermissionsRequest $request, User $user)
    {
        $permissions = $request->input('permissions', []);
        $user->permissions()->detach($permissions);
        return response()->json([
            'message' => 'Permissions removed successfully',
            'user' => UserResource::make($user->load('permissions')),
        ]);
    }

    public function assignRoles(Request $request, User $user)
    {
        $roles = $request->input('roles', []);
        $user->roles()->syncWithoutDetaching($roles);
        return response()->json([
            'message' => 'Roles assigned successfully',
            'user' => UserResource::make($user->load('roles')),
        ]);
    }

    public function removeRoles(Request $request, User $user)
    {
        $roles = $request->input('roles', []);
        $user->roles()->detach($roles);
        return response()->json([
            'message' => 'Roles removed successfully',
            'user' => UserResource::make($user->load('roles')),
        ]);
    }
}
