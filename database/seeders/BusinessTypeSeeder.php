<?php

namespace Database\Seeders;

use App\Models\BusinessType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'name' => 'Cafe'
            ],
            [
                'name' => 'Institute'
            ]
        ];
        foreach ($business_types as $business_type) {
            BusinessType::create($business_type);
        }
    }
}
