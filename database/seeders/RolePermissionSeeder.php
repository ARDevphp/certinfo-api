<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $role = Role::create(['name' => 'admin']);

        Permission::create(['name' => 'role:viewAny']);
        Permission::create(['name' => 'role:view']);
        Permission::create(['name' => 'role:assign']);
        Permission::create(['name' => 'role:create']);
        Permission::create(['name' => 'role:update']);
        Permission::create(['name' => 'role:delete']);
        Permission::create(['name' => 'role:restore']);
        Permission::create(['name' => 'permission:viewAny']);
        Permission::create(['name' => 'permission:view']);
        Permission::create(['name' => 'permission:assign']);
        Permission::create(['name' => 'permission:create']);
        Permission::create(['name' => 'permission:update']);
        Permission::create(['name' => 'permission:delete']);
        Permission::create(['name' => 'permission:restore']);
        Permission::create(['name' => 'user:viewAny']);
        Permission::create(['name' => 'user:view']);
        Permission::create(['name' => 'user:create']);
        Permission::create(['name' => 'user:update']);
        Permission::create(['name' => 'user:delete']);
        Permission::create(['name' => 'user:restore']);

        $role = Role::create(['name' => 'teacher']);
        $permissions = [
            Permission::create(['name' => 'course:viewAny']),
            Permission::create(['name' => 'course:view']),
            Permission::create(['name' => 'course:create']),
            Permission::create(['name' => 'course:update']),
            Permission::create(['name' => 'course:delete']),
            Permission::create(['name' => 'course:restore']),
        ];
        $role->syncPermissions($permissions);

        $role = Role::create(['name' => 'student']);
        $helpDeskPermissions = [
            Permission::create(['name' => 'person:viewAny']),
            Permission::create(['name' => 'person:view']),
            Permission::create(['name' => 'person:create']),
            Permission::create(['name' => 'person:update']),
            Permission::create(['name' => 'person:delete']),
            Permission::create(['name' => 'person:restore']),
            Permission::create(['name' => 'email:viewAny']),
            Permission::create(['name' => 'email:view']),
            Permission::create(['name' => 'email:create']),
            Permission::create(['name' => 'email:update']),
            Permission::create(['name' => 'email:delete']),
            Permission::create(['name' => 'email:restore']),
        ];
        $role->syncPermissions($helpDeskPermissions);
    }
}
