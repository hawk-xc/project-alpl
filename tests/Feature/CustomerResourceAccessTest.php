<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Customer;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerResourceAccessTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function access_customer_dashboard_without_allowed_roles(): void
    {
        $role = Role::firstOrCreate([
            'name' => 'guest',
            'guard_name' => 'web',
        ]);

        $user = User::factory()->create()->assignRole($role->name);

        $response = $this->actingAs($user)->get('/admin/customers');

        $response->assertStatus(403);
    }

    /** @test */
    public function create_customer_data_without_allowed_permission_in_roles(): void
    {
        $role = Role::firstOrCreate([
            'name' => 'guest',
            'guard_name' => 'web',
        ]);

        $permission = Permission::create(['name' => 'false:role']);

        $role->syncPermissions($permission->name);

        $payload = [
            'tariff_id' => 1,
            'email' => 'budi001gaming@gmail.com',
            'customer_id' => '51728394055',
            'username' => 'budi01',
            'password' => bcrypt('bud1s4nD1'),
            'name' => 'budi setiawan',
            'address' => 'Yogyakarta',
        ];

        $user = User::factory()->create()->assignRole($role->name);

        $response = $this->actingAs($user)->post('/admin/customers', $payload);

        $response->assertStatus(405);
    }

    /** @test */
    public function delete_customer_data_without_allowed_permission_in_roles(): void
    {
        $role = Role::firstOrCreate([
            'name' => 'guest',
            'guard_name' => 'web',
        ]);

        $permission = Permission::create(['name' => 'false:role']);

        $role->syncPermissions($permission->name);

        $user = User::factory()->create()->assignRole($role->name);
        $customer = Customer::factory()->create();

        $response = $this->actingAs($user)->delete('/admin/customers', ['id' => $customer->id]);

        $response->assertStatus(405);
    }
}
