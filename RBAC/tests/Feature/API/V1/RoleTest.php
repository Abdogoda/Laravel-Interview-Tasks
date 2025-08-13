<?php

namespace Tests\Feature\API\V1;

use App\Models\Permission;
use App\Models\Role;
use Tests\TestCase;

class RoleTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_user_can_create_role(): void
    {
        $this->authenticate($this->createOwner());
        $response = $this->postJson('/api/v1/roles', [
            'name' => 'Admin',
        ]);

        $response->assertCreated();
        $this->assertArrayHasKey('role', $response->json());
    }

    public function test_user_can_update_role(): void
    {
        $this->authenticate($this->createOwner());
        $role = Role::create(['name' => 'Admin']);

        $response = $this->putJson("/api/v1/roles/{$role->id}", [
            'name' => 'Super Admin',
        ]);

        $response->assertOk();
        $this->assertEquals('Super Admin', $role->fresh()->name);
    }

    public function test_user_can_delete_role(): void
    {
        $this->authenticate($this->createOwner());
        $role = Role::create(['name' => 'Admin']);

        $response = $this->deleteJson("/api/v1/roles/{$role->id}");

        $response->assertOk();
        $this->assertNull($role->fresh());
    }

    public function test_user_can_list_roles(): void
    {
        $this->authenticate($this->createOwner());
        Role::factory()->count(3)->create();

        $response = $this->getJson('/api/v1/roles');

        $response->assertOk();
        $this->assertCount(4, $response->json());
    }

    public function test_user_can_show_role(): void
    {
        $this->authenticate($this->createOwner());
        $role = Role::create(['name' => 'Admin']);

        $response = $this->getJson("/api/v1/roles/{$role->id}");

        $response->assertOk();
        $this->assertEquals('Admin', $response->json()['name']);
    }

    public function test_user_can_add_permissions_to_role(): void
    {
        $this->authenticate($this->createOwner());
        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::factory()->count(2)->create();

        $response = $this->postJson("/api/v1/roles/{$role->id}/permissions", [
            'permissions' => $permissions->pluck('id')->toArray(),
        ]);

        $response->assertOk();
        $this->assertEqualsCanonicalizing(
            $permissions->pluck('id')->toArray(),
            $role->fresh()->permissions()->pluck('permissions.id')->toArray()
        );
    }

    public function test_user_can_remove_permissions_from_role(): void
    {
        $this->authenticate($this->createOwner());
        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::factory()->count(2)->create();
        $role->permissions()->attach($permissions);

        $response = $this->deleteJson("/api/v1/roles/{$role->id}/permissions", [
            'permissions' => $permissions->pluck('id')->toArray(),
        ]);

        $response->assertOk();
        $this->assertEmpty($role->fresh()->permissions);
    }

    public function test_unauthenticated_user_cannot_access_roles(): void
    {
        $response = $this->getJson('/api/v1/roles');

        $response->assertUnauthorized();
    }

    public function test_unauthorized_user_cannot_access_roles(): void
    {
        $this->authenticate();
        $response = $this->getJson('/api/v1/roles');

        $response->assertForbidden();
    }
}
