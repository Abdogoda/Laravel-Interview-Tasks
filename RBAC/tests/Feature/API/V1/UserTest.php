<?php

namespace Tests\Feature\API\V1;


use Tests\TestCase;
use App\Models\User;
use App\Models\Role;

class UserTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_user_can_create_user(): void
    {
        $this->authenticate($this->createOwner());
        $response = $this->postJson('/api/v1/users', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password',
        ]);

        $response->assertCreated();
        $this->assertArrayHasKey('user', $response->json());
    }

    public function test_user_can_update_user(): void
    {
        $this->authenticate($this->createOwner());
        $user = User::factory()->create();

        $response = $this->putJson("/api/v1/users/{$user->id}", [
            'name' => 'Jane Doe',
        ]);

        $response->assertOk();
        $this->assertEquals('Jane Doe', $user->fresh()->name);
    }

    public function test_user_can_delete_user(): void
    {
        $this->authenticate($this->createOwner());
        $user = User::factory()->create();

        $response = $this->deleteJson("/api/v1/users/{$user->id}");

        $response->assertOk();
        $this->assertNull($user->fresh());
    }

    public function test_user_can_list_users(): void
    {
        $this->authenticate($this->createOwner());
        User::factory()->count(3)->create();

        $response = $this->getJson('/api/v1/users');

        $response->assertOk();
        $this->assertCount(4, $response->json());
    }

    public function test_user_can_show_user(): void
    {
        $this->authenticate($this->createOwner());
        $user = User::factory()->create(['name' => 'John Doe']);

        $response = $this->getJson("/api/v1/users/{$user->id}");

        $response->assertOk();
        $this->assertEquals('John Doe', $response->json()['name']);
    }

    public function test_user_can_add_roles_to_user(): void
    {
        $this->authenticate($this->createOwner());
        $user = User::factory()->create();
        $roles = Role::factory()->count(2)->create();

        $response = $this->postJson("/api/v1/users/{$user->id}/roles", [
            'roles' => $roles->pluck('id')->toArray(),
        ]);

        $response->assertOk();
        $this->assertEqualsCanonicalizing(
            $roles->pluck('id')->toArray(),
            $user->fresh()->roles()->pluck('roles.id')->toArray()
        );
    }

    public function test_user_can_remove_roles_from_user(): void
    {
        $this->authenticate($this->createOwner());
        $user = User::factory()->create();
        $roles = Role::factory()->count(2)->create();
        $user->roles()->attach($roles);

        $response = $this->deleteJson("/api/v1/users/{$user->id}/roles", [
            'roles' => $roles->pluck('id')->toArray(),
        ]);

        $response->assertOk();
        $this->assertEmpty($user->fresh()->roles);
    }

    public function test_unauthenticated_user_cannot_access_users(): void
    {
        $response = $this->getJson('/api/v1/users');

        $response->assertUnauthorized();
    }

    public function test_unauthorized_user_cannot_access_users(): void
    {
        $this->authenticate();
        $response = $this->getJson('/api/v1/users');

        $response->assertForbidden();
    }
}
