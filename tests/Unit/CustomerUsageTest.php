<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Customer;
use App\Models\CustomerUsage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerUsageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_add_bulk_customers_usage_and_bills(): void
    {
        $usagePower = [120, 150, 170, 190];
        $customer = Customer::factory()->create();

        for ($customerUsage = 0; $customerUsage < 10; $customerUsage++) {
            $customerUsageData = [
                'customer_id' => $customer->id,
                'month' => 'January',
                'year' => 2026,
                'start_meter' => 130,
                'end_meter' => $usagePower[array_rand($usagePower)],
            ];

            CustomerUsage::create($customerUsageData);
        }

        $this->assertDatabaseHas('customers', [
            'username' => $customer->username,
        ]);
    }
}
