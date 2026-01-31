<?php

namespace Database\Factories;

use App\Models\CustomerTariff;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $customerId = str_pad(random_int(0, 99999999999), 11, '0', STR_PAD_LEFT);
        $customerTarifGetId = CustomerTariff::factory()->create();

        $customer = [
            'name' => 'ikhwan',
            'tariff_id' => $customerTarifGetId->id,
            'customer_id' => $customerId,
            'username' => 'ikhwanudin11',
            'email' => 'ikhwan@gmail.com',
            'address' => 'Saint ST1',
            'password' => bcrypt('rootme')
        ];

        return $customer;
    }
}
