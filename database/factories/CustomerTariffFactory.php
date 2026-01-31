<?php

namespace Database\Factories;

use App\Models\CustomerTariff;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerTariffFactory extends Factory
{
    protected $model = CustomerTariff::class;

    public function definition(): array
    {
        return [
            'power' => $this->faker->numberBetween(100, 1000),
            'price_in_kwh' => $this->faker->numberBetween(1000, 10000),
        ];
    }
}
