<?php

namespace App\Actions\Platform;

use App\Enums\TenantStatusEnum;
use App\Models\Business;
use App\Models\OnboardData;
use App\Models\Tenant;
use App\Services\TenantDatabaseService;
use Illuminate\Support\Facades\DB;

class OnboardingAction
{
    private $tenant;
    private $onboardData;
    private $business;
    public function OnboardNewTenant()
    {
        $this->onboardData = OnboardData::where('user_id', auth()->user()->id)->first();
        $this->business = Business::where('slug', $this->onboardData->business_slug)->first();
        if ($this->onboardData) {
            try {
                DB::transaction(function () {
                    $this->createTenant();
                });
                $this->createDatabase($this->tenant->db_name);
                $this->migrateTenant();
                session()->forget('onboarding_data');
                $this->onboardData->delete();
            } catch (\Throwable $th) {
                dd($th);
                info($th);
            }
        }
    }

    public function createTenant()
    {
        $this->tenant = Tenant::create([
            'name' => $this->onboardData->business_name,
            'domain' => $this->onboardData->domain,
            'status' => TenantStatusEnum::ACTIVE,
            'business_id' => $this->business->id,
            'theme_id' => $this->onboardData->theme->id,
            'username' => $this->onboardData->domain,
            'password' => 'password',
        ]);
        $this->tenant->db_name = 'mytenant_' . $this->tenant->id;
        $this->tenant->save();
    }

    public function createDatabase(string $databaseName): void
    {
        DB::statement("CREATE DATABASE IF NOT EXISTS `$databaseName`");
    }

    public function migrateTenant()
    {
        $tenantDatabaseService = new TenantDatabaseService();
        $migrationPath = $tenantDatabaseService->getMigrationPath($this->tenant);
        $tenantDatabaseService->migrateDatabase($this->tenant->db_name, $migrationPath);
    }
}
