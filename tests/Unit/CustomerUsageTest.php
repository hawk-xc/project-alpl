<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class CustomerUsageTest extends TestCase
{
    /** @test */
    public function can_add_bulk_customers_bills(): void
    {
        $customerCounts = 0;
        foreach ($customerCounts < 5) {
            $customers = Customer::factory()->create();
            $customerCounts++;
        }
    }
}
