<?php

namespace Tests\Feature\API\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_user_can_register(): void
    {
        $response = $this->postJson('/api/v1/register', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertCreated();
        $this->assertArrayHasKey('user', $response->json());
    }

    public function test_register_failed_with_invalid_data(): void
    {
        $response = $this->postJson('/api/v1/register', [
            'name' => '',
            'email' => 'invalid-email',
            'password' => 'short',
            'password_confirmation' => 'mismatch',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['name', 'email', 'password']);
    }

    public function test_user_can_login(): void
    {
        $user = $this->createUser([
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->postJson('/api/v1/login', [
            'email' => 'john@example.com',
            'password' => 'password',
        ]);

        $response->assertOk();
        $this->assertArrayHasKey('token', $response->json());
    }

    public function test_login_failed_with_invalid_credentials(): void
    {
        $response = $this->postJson('/api/v1/login', [
            'email' => 'john@example.com',
            'password' => 'wrong-password',
        ]);

        $response->assertUnauthorized();
        $this->assertArrayHasKey('message', $response->json());
    }

    public function test_authenticated_user_can_logout(): void
    {
        $user = $this->authenticate();

        $response = $this->postJson('/api/v1/logout');

        $response->assertOk();
        $this->assertNull($user->fresh()->token);
    }

    public function test_authenticated_user_can_get_profile(): void
    {
        $user = $this->authenticate();

        $response = $this->getJson('/api/v1/me');

        $response->assertOk();
        $this->assertEquals($user->id, $response->json('id'));
    }

    public function test_unauthenticated_user_cannot_access_profile(): void
    {
        $response = $this->getJson('/api/v1/me');

        $response->assertUnauthorized();
        $this->assertArrayHasKey('message', $response->json());
    }
}
