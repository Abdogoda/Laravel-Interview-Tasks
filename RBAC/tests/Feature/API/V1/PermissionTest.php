<?php

namespace Tests\Feature\API\V1;

use Tests\TestCase;

class PermissionTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_user_can_list_permissions(): void
    {
        $this->authenticate($this->createOwner());

        $response = $this->getJson('/api/v1/permissions');

        $response->assertOk();
    }

    public function test_unauthenticated_user_cannot_access_permissions(): void
    {
        $response = $this->getJson('/api/v1/permissions');

        $response->assertUnauthorized();
    }

    public function test_unauthorized_user_cannot_access_permissions(): void
    {
        $this->authenticate();
        $response = $this->getJson('/api/v1/permissions');

        $response->assertForbidden();
    }
}
