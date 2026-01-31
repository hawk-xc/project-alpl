<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RolePermissionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_role()
    {
        $role = Role::create(['name' => 'admin']);

        $this->assertDatabaseHas('roles', [
            'name' => 'admin',
        ]);
    }

    /** @test */
    public function can_create_permission()
    {
        $permission = Permission::create(['name' => 'edit:payment']);

        $this->assertDatabaseHas('permissions', [
            'name' => 'edit:payment',
        ]);
    }

    /** @test */
    public function permission_can_be_assigned_to_role()
    {
        $role = Role::create(['name' => 'editor']);
        $permission = Permission::create(['name' => 'edit:payment']);

        $role->givePermissionTo($permission);

        $this->assertTrue(
            $role->hasPermissionTo('edit:payment')
        );
    }
}
