<?php

namespace Database\Seeders;

use App\Models\CustomerTariff;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerTariffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CustomerTariff::create([
            'power' => 900,
            'price_in_kwh' => 1352,
        ]);

        CustomerTariff::create([
            'power' => 1300,
            'price_in_kwh' => 1695,
        ]);

        CustomerTariff::create([
            'power' => 1600,
            'price_in_kwh' => 2038,
        ]);

        CustomerTariff::create([
            'power' => 2000,
            'price_in_kwh' => 2381,
        ]);
    }
}
