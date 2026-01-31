<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = [
            [
                'tariff_id' => 1,
                'email' => 'budi001gaming@gmail.com',
                'customer_id' => '51728394055',
                'username' => 'budi01',
                'password' => bcrypt('bud1s4nD1'),
                'name' => 'budi setiawan',
                'address' => 'Yogyakarta',
            ],
            [
                'tariff_id' => 1,
                'email' => 'riskigofar@gmail.com',
                'customer_id' => '51728394056',
                'username' => 'riski01',
                'password' => bcrypt('riski123'),
                'name' => 'riski setiawan',
                'address' => 'Bandar Lampung',
            ],
        ];

        foreach ($customers as $customer) {
            $user = Customer::create($customer);
            $user->assignRole('customer');
        }
    }
}
