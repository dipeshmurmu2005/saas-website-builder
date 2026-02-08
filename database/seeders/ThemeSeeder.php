<?php

namespace Database\Seeders;

use App\Enums\ThemeStatusEnum;
use App\Models\Theme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $themes = [
            [
                'business_type_id' => 1,
                'name' => 'Modern',
                'status' => ThemeStatusEnum::ACTIVE
            ],
            [
                'business_type_id' => 1,
                'name' => 'Classic',
                'status' => ThemeStatusEnum::ACTIVE
            ],
            [
                'business_type_id' => 2,
                'name' => 'Classic',
                'status' => ThemeStatusEnum::ACTIVE
            ],
            [
                'business_type_id' => 2,
                'name' => 'Modern',
                'status' => ThemeStatusEnum::ACTIVE
            ]
        ];
        foreach ($themes as $theme) {
            Theme::create($theme);
        }
    }
}
