<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'admin',
                'guard_name' => 'web',
            ],
            [
                'name' => 'petugas',
                'guard_name' => 'web',
            ],
            [
                'name' => 'customer',
                'guard_name' => 'customer',
            ]
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate($role);
        }

        $admin = Role::findByName('admin', 'web');
        $admin->syncPermissions(
            Permission::where('guard_name', 'web')->get()
        );

        $customer = Role::findByName('customer', 'customer');
        $customer->syncPermissions([
            'customer_usages:list',
            'customer_payment:list',
            'customer_tariff:detail',
            'customer:detail',
        ]);
    }
}
