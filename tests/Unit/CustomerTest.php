<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Customer;
use App\Models\CustomerTariff;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_customer_and_assign_to_customer_role()
    {
        $customerTariff = CustomerTariff::factory()->create();
        $customerRole = Role::firstOrCreate([
            'name' => 'customer',
            'guard_name' => 'customer'
        ]);
        $customerId = str_pad(random_int(0, 99999999999), 11, '0', STR_PAD_LEFT);

        $customer = [
            'tariff_id' => $customerTariff->id,
            'customer_id' => $customerId,
            'name' => 'andy hermawan',
            'username' => 'kickandy',
            'address' => 'Jl. Palagan Patimura No. 14',
            'email' => 'echo.andy@gmail.com',
            'password' => bcrypt('rootme')
        ];

        $customer = Customer::create($customer)->assignRole($customerRole->name);

        $this->assertDatabaseHas('customers', [
            'username' => 'kickandy',
        ]);

        $this->assertTrue(
            $customer->hasRole('customer', 'customer')
        );
    }

    /** @test */
    public function can_update_customer()
    {
        $newName = 'johnconnor12';

        $customer = Customer::factory()->create();

        $customer->update(['username' => $newName]);

        $this->assertDatabaseHas('customers', [
            'username' => $newName,
        ]);
    }
}
