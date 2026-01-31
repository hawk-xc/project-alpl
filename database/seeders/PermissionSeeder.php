<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // customer
            'customer:create',
            'customer:edit',
            'customer:delete',
            'customer:list',
            'customer:detail',
            // tariff
            'tariff:create',
            'tariff:edit',
            'tariff:delete',
            'tariff:list',
            'tariff:detail',
            // user
            'user:create',
            'user:edit',
            'user:delete',
            'user:list',
            'user:detail',
            // role
            'role:create',
            'role:edit',
            'role:delete',
            'role:list',
            'role:detail',
            // permission
            'permission:create',
            'permission:edit',
            'permission:delete',
            'permission:list',
            'permission:detail',
            // customer_tariff
            'customer_tariff:create',
            'customer_tariff:edit',
            'customer_tariff:delete',
            'customer_tariff:list',
            'customer_tariff:detail',
            // customer_payment
            'customer_payment:create',
            'customer_payment:edit',
            'customer_payment:delete',
            'customer_payment:list',
            'customer_payment:detail',
            // customer_usages
            'customer_usages:create',
            'customer_usages:edit',
            'customer_usages:delete',
            'customer_usages:list',
            'customer_usages:detail',
        ];

        $customerPermissions = [
            'customer_usages:list',
            'customer_payment:list',
            'customer_tariff:detail',
            'customer:detail',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        foreach ($customerPermissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'customer',
            ]);
        }
    }
}
