<?php

namespace Database\Seeders;

use App\Models\BusinessType;
use Illuminate\Database\Seeder;

class BusinessTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $business_types = [
            [
                'name' => 'Cafe',
                'slug' => 'cafe',
                'max_limit' => 3,
            ],
            [
                'name' => 'Institute',
                'slug' => 'institute',
                'max_limit' => 3,
            ]
        ];
        foreach ($business_types as $business_type) {
            BusinessType::create($business_type);
        }
    }
}
