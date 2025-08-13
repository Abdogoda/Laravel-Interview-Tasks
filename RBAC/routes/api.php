<?php

use App\Enums\PermissionEnum;
use App\Http\Controllers\API\V1\AuthenticationController;
use App\Http\Controllers\API\V1\PermissionController;
use App\Http\Controllers\API\V1\RoleController;
use App\Http\Controllers\API\V1\UserController;
use Illuminate\Support\Facades\Route;

// Authentication Routes
Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/register', [AuthenticationController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    // Profile Routes
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/me', [AuthenticationController::class, 'me']);

    // User Management Routes
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->middleware('hasPermissions:' . PermissionEnum::VIEW_USERS->value);
        Route::get('/users/{user}', 'show')->middleware('hasPermissions:' . PermissionEnum::VIEW_USER->value);
        Route::post('/users', 'store')->middleware('hasPermissions:' . PermissionEnum::CREATE_USER->value);
        Route::put('/users/{user}', 'update')->middleware('hasPermissions:' . PermissionEnum::UPDATE_USER->value);
        Route::delete('/users/{user}', 'destroy')->middleware('hasPermissions:' . PermissionEnum::DELETE_USER->value);

        // Assign/Remove permissions to user
        Route::post('/users/{user}/permissions', [UserController::class, 'assignPermissions'])->middleware('hasPermissions:' . PermissionEnum::UPDATE_USER->value);
        Route::delete('/users/{user}/permissions', [UserController::class, 'removePermissions'])->middleware('hasPermissions:' . PermissionEnum::UPDATE_USER->value);

        // Assign/Remove roles to user
        Route::post('/users/{user}/roles', [UserController::class, 'assignRoles'])->middleware('hasPermissions:' . PermissionEnum::UPDATE_USER->value);
        Route::delete('/users/{user}/roles', [UserController::class, 'removeRoles'])->middleware('hasPermissions:' . PermissionEnum::UPDATE_USER->value);
    });

    // Role Management Routes
    Route::controller(RoleController::class)->group(function () {
        Route::get('/roles', 'index')->middleware('hasPermissions:' . PermissionEnum::VIEW_ROLES->value);
        Route::get('/roles/{role}', 'show')->middleware('hasPermissions:' . PermissionEnum::VIEW_ROLE->value);
        Route::post('/roles', 'store')->middleware('hasPermissions:' . PermissionEnum::CREATE_ROLE->value);
        Route::put('/roles/{role}', 'update')->middleware('hasPermissions:' . PermissionEnum::UPDATE_ROLE->value);
        Route::delete('/roles/{role}', 'destroy')->middleware('hasPermissions:' . PermissionEnum::DELETE_ROLE->value);

        // Assign/Remove permissions to role
        Route::post('/roles/{role}/permissions', [RoleController::class, 'assignPermissions'])->middleware('hasPermissions:' . PermissionEnum::UPDATE_ROLE->value);
        Route::delete('/roles/{role}/permissions', [RoleController::class, 'removePermissions'])->middleware('hasPermissions:' . PermissionEnum::UPDATE_ROLE->value);
    });

    // Permission Management Routes
    Route::get('/permissions', [PermissionController::class, 'index'])->middleware('hasPermissions:' . PermissionEnum::VIEW_PERMISSIONS->value);
});