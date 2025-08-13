<?php

namespace Tests;

use App\Models\Role;
use App\Models\User;
use Database\Seeders\RolePermissionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Sanctum\Sanctum;

abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(RolePermissionSeeder::class);
    }

    protected function createUser(array $attributes = [])
    {
        return User::factory()->create($attributes);
    }

    protected function createOwner(array $attributes = [])
    {
        $user = $this->createUser($attributes);
        $ownerRole = Role::where(['name' => 'Owner'])->first();
        $user->roles()->attach($ownerRole);
        return $user;
    }

    protected function authenticate($user = null)
    {
        $user = $user ?: $this->createUser();
        Sanctum::actingAs($user);
        return $user;
    }
}
