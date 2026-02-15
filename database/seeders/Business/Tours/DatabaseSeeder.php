<?php

namespace Database\Seeders\Business\Tours;

use App\Models\Business\Tours\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::UpdateOrCreate([
            'id' => 1,
        ], [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password'
        ]);
        $this->call(PageSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(DestinationSeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(PackageDestinationSeeder::class);
        $this->call(PackageItinerarySeeder::class);
        $this->call(TestimonialSeeder::class);
    }
}
