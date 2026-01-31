<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Customer;
use App\Models\CustomerTariff;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_customer()
    {
        $tariff = CustomerTariff::factory()->create();

        $customer = [
            'name' => 'John Doe',
            'tariff_id' => $tariff->id,
            'username' => 'jonhny123',
            'customer_id' => '12345678922',
            'address' => '123 Main St',
            'email' => 'john@example.com',
            'password' => 'password',
        ];

        $customer = Customer::create($customer);

        $this->assertDatabaseHas('customers', [
            'username' => 'jonhny123',
        ]);
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
