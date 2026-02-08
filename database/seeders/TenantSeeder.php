<?php

namespace Database\Seeders;

use App\Enums\TenantStatusEnum;
use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenants = [
            [
                'name' => 'One Cafe',
                'domain' => 'onecafe.tenancy.test',
                'status' => TenantStatusEnum::ACTIVE,
                'business_type_id' => 1,
                'db_name' => 'mytenant1',
                'db_username' => 'root',
                'db_password' => 'password',
                'theme_id' => 1
            ],
            [
                'name' => 'Two Cafe',
                'domain' => 'twocafe.tenancy.test',
                'status' => TenantStatusEnum::ACTIVE,
                'business_type_id' => 1,
                'db_name' => 'mytenant2',
                'db_username' => 'root',
                'db_password' => 'password',
                'theme_id' => 2
            ],
            [
                'name' => 'One Institute',
                'domain' => 'oneins.tenancy.test',
                'status' => TenantStatusEnum::ACTIVE,
                'business_type_id' => 2,
                'db_name' => 'mytenant_3',
                'db_username' => 'root',
                'db_password' => 'password',
                'theme_id' => 3
            ],
            [
                'name' => 'Two Institute',
                'domain' => 'twoins.tenancy.test',
                'status' => TenantStatusEnum::ACTIVE,
                'business_type_id' => 2,
                'db_name' => 'mytenant_3',
                'db_username' => 'root',
                'db_password' => 'password',
                'theme_id' => 4
            ]
        ];

        foreach ($tenants as $tenant) {
            $tenant = Tenant::create($tenant);
            DB::statement("CREATE DATABASE IF NOT EXISTS mytenant_{$tenant->id}");
        }
    }
}
