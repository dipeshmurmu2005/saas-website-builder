<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'business_id' => 1,
                'name' => 'Starter',
                'slug' => 'cafe-starter',
                'price_monthly' => 200,
                'price_yearly' => 600,
            ],
            [
                'business_id' => 1,
                'name' => 'Growth',
                'slug' => 'cafe-growth',
                'price_monthly' => 200,
                'price_yearly' => 600,
            ],
            [
                'business_id' => 1,
                'name' => 'Premium',
                'slug' => 'cafe-premium',
                'price_monthly' => 200,
                'price_yearly' => 600,
            ]
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
