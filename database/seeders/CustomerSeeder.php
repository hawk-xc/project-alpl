<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'tariff_id' => 1,
            'username' => 'budi01',
            'password' => 'bud1s4nD1',
            'name' => 'budi setiawan',
            'address' => 'Yogyakarta',
            'password' => bcrypt('bud1s4nD1'),
        ]);

        Customer::create([
            'tariff_id' => 1,
            'username' => 'riski01',
            'password' => 'riski123',
            'name' => 'riski setiawan',
            'address' => 'Bandar Lampung',
            'password' => bcrypt('riski123'),
        ]);
    }
}
