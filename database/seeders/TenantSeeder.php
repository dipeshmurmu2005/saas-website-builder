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
                'user_id' => 1,
                'username' => 'onecafe',
                'domain' => 'onecafe.gridlayers.test',
                'status' => TenantStatusEnum::ACTIVE,
                'business_id' => 1,
                'db_name' => 'mytenant1',
                'password' => 'password',
                'theme_id' => 1
            ],
            [
                'name' => 'Two Cafe',
                'user_id' => 1,
                'username' => 'twocafe',
                'domain' => 'twocafe.gridlayers.test',
                'status' => TenantStatusEnum::ACTIVE,
                'business_id' => 1,
                'db_name' => 'mytenant2',
                'password' => 'password',
                'theme_id' => 2
            ],
            [
                'name' => 'One Institute',
                'username' => 'oneins',
                'user_id' => 1,
                'domain' => 'oneins.gridlayers.test',
                'status' => TenantStatusEnum::ACTIVE,
                'business_id' => 2,
                'db_name' => 'mytenant_3',
                'password' => 'password',
                'theme_id' => 3
            ],
            [
                'name' => 'Two Institute',
                'username' => 'twoins',
                'user_id' => 1,
                'domain' => 'twoins.gridlayers.test',
                'status' => TenantStatusEnum::ACTIVE,
                'business_id' => 2,
                'db_name' => 'mytenant_3',
                'password' => 'password',
                'theme_id' => 4
            ]
        ];

        foreach ($tenants as $tenant) {
            $tenant = Tenant::create($tenant);
            DB::statement("CREATE DATABASE IF NOT EXISTS mytenant_{$tenant->id}");
        }
    }
}
