<?php

namespace Database\Seeders;

use App\Enums\PermissionEnum;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Create owner role
        $ownerRole = Role::firstOrCreate(['name' => 'Owner']);

        // Upload all permission on db
        $permissions = PermissionEnum::cases();
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission->value]);
        }

        // Assign all permissions to owner role
        $ownerRole->permissions()->sync(Permission::all());
    }
}
