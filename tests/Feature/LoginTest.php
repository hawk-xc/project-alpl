<?php

namespace Tests\Feature;

use App\Models\Customer;
use Tests\TestCase;
use App\Models\User;
use Filament\Facades\Filament;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function access_admin_login_page(): void
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
    }

    /** @test */
    public function access_customer_login_page(): void
    {
        $response = $this->get('/customer/login');

        $response->assertStatus(200);
    }

    /** @test */
    public function admin_user_can_access_dashboard(): void
    {
        $role = Role::firstOrCreate(['name' => 'admin']);

        $user = User::factory()->create();
        $user->assignRole($role->name);

        $this->actingAs($user);

        $this->get('/admin')->assertOk();
    }
}
