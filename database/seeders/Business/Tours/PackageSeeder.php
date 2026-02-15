<?php

namespace Database\Seeders\Business\Tours;

use App\Enums\Business\Tours\PackageStatusEnum;
use Illuminate\Database\Seeder;
use App\Models\Business\Tours\Country;
use App\Models\Business\Tours\Package;
use Illuminate\Support\Str;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $packageTemplates = [
            [
                'title' => 'Classic Cultural Tour',
                'duration_days' => 5,
                'type' => 'domestic',
                'short_description' => 'Explore heritage sites, local culture, and traditional lifestyle.',
            ],
            [
                'title' => 'Adventure & Hiking Experience',
                'duration_days' => 7,
                'type' => 'international',
                'short_description' => 'Perfect blend of hiking, nature, and adventure activities.',
            ],
            [
                'title' => 'Luxury Holiday Escape',
                'duration_days' => 6,
                'type' => 'mixed',
                'short_description' => 'Premium hotels, private transport, and relaxed experiences.',
            ],
            [
                'title' => 'Budget Friendly Tour',
                'duration_days' => 4,
                'type' => 'domestic',
                'short_description' => 'Affordable tour package with essential highlights.',
            ],
            [
                'title' => 'Family Vacation Package',
                'duration_days' => 6,
                'type' => 'mixed',
                'short_description' => 'Comfortable and fun-filled tour suitable for families.',
            ],
            [
                'title' => 'Nature & Wildlife Tour',
                'duration_days' => 5,
                'type' => 'group',
                'short_description' => 'National parks, wildlife safari, and nature exploration.',
            ],
            [
                'title' => 'Photography Special Tour',
                'duration_days' => 8,
                'type' => 'family',
                'short_description' => 'Designed for photographers and nature lovers.',
            ],
            [
                'title' => 'Festival & Local Experience',
                'duration_days' => 7,
                'type' => 'honeymoon',
                'short_description' => 'Experience local festivals, food, and traditions.',
            ],
        ];

        $services = [
            [
                'icon'  => 'heroicon-o-home',
                'title' => 'Accommodation',
                'value' => '3–5 Star Hotels',
            ],
        ];

        $images = [
            'tours/destinations/bhutan/1.jpg',
            'tours/destinations/bhutan/2.jpg',
            'tours/destinations/bhutan/3.jpg',
            'tours/destinations/bhutan/4.jpg',
            'tours/destinations/bhutan/5.jpg',
            'tours/destinations/kathmandu/1.jpg',
            'tours/destinations/kathmandu/2.jpg',
            'tours/destinations/kathmandu/3.webp',
            'tours/destinations/kathmandu/4.webp',
            'tours/destinations/kathmandu/5.jpg',
            'tours/destinations/pokhara/1.jpg',
            'tours/destinations/pokhara/2.jpg',
            'tours/destinations/pokhara/3.jpg',
            'tours/destinations/pokhara/4.jpg',
            'tours/destinations/pokhara/5.jpg',
            'tours/destinations/everest/1.webp',
            'tours/destinations/everest/2.jpg',
            'tours/destinations/everest/3.jpg',
            'tours/destinations/everest/4.jpeg',
            'tours/destinations/everest/5.webp',
            'tours/destinations/delhi/1.jpg',
            'tours/destinations/delhi/2.webp',
            'tours/destinations/delhi/3.jpg',
            'tours/destinations/delhi/4.jpg',
            'tours/destinations/delhi/5.jpg',
            'tours/destinations/goa/1.jpg',
            'tours/destinations/goa/2.avif',
            'tours/destinations/goa/3.jpg',
            'tours/destinations/goa/4.avif',
            'tours/destinations/goa/5.jpg',
            'tours/destinations/bhutan/1.jpg',
            'tours/destinations/bhutan/2.jpg',
            'tours/destinations/bhutan/3.jpg',
            'tours/destinations/bhutan/4.jpg',
            'tours/destinations/bhutan/5.jpg',
            'tours/destinations/lhasa/1.jpg',
            'tours/destinations/lhasa/2.jpg',
            'tours/destinations/lhasa/3.jpg',
            'tours/destinations/lhasa/4.webp',
            'tours/destinations/lhasa/5.jpeg',
            'tours/destinations/patola/1.webp',
            'tours/destinations/patola/2.jpg',
            'tours/destinations/patola/3.jpeg',
            'tours/destinations/patola/4.webp',
            'tours/destinations/patola/5.avif',
            'tours/destinations/kailash/1.jpg',
            'tours/destinations/kailash/2.jpg',
            'tours/destinations/kailash/3.webp',
            'tours/destinations/kailash/4.jpg',
            'tours/destinations/kailash/5.jpg',
            'tours/destinations/colombo/1.jpg',
            'tours/destinations/colombo/2.jpg',
            'tours/destinations/colombo/3.webp',
            'tours/destinations/colombo/4.webp',
            'tours/destinations/colombo/5.webp',
            'tours/destinations/kandy/1.jpg',
            'tours/destinations/kandy/2.jpg',
            'tours/destinations/kandy/3.jpg',
            'tours/destinations/kandy/4.jpg',
            'tours/destinations/kandy/5.jpg',
            'tours/destinations/sigiriya/1.jpeg',
            'tours/destinations/sigiriya/2.jpg',
            'tours/destinations/sigiriya/3.jpg',
            'tours/destinations/sigiriya/4.jpeg',
            'tours/destinations/sigiriya/5.webp',
        ];


        Country::all()->each(function ($country) use ($packageTemplates, $services, $images) {
            foreach ($packageTemplates as $index => $template) {

                $originalPrice = rand(800, 2500);
                $discountedPrice = $originalPrice - rand(100, 400);

                Package::create([
                    'title' => $country->name . ' ' . $template['title'],
                    'duration_days' => $template['duration_days'],
                    'original_price' => $originalPrice,
                    'discounted_price' => $discountedPrice,
                    'type' => $template['type'],
                    'status' => PackageStatusEnum::ACTIVE,
                    'trip_start_date' => now()->addDays(rand(10, 60)),
                    'trip_end_date' => now()->addDays(rand(70, 120)),
                    'slug' => Str::slug($country->name . ' ' . $template['title']),
                    'is_featured' => $index < 2,
                    'is_offer' => $discountedPrice < $originalPrice,
                    'short_description' => $template['short_description'],
                    'description' => 'This package offers a well-balanced itinerary covering major highlights, local culture, and memorable experiences in ' . $country->name . '.',
                    'services' => $services,
                    'images' => [
                        $images[rand(0, 64)],
                        $images[rand(0, 64)],
                        $images[rand(0, 64)],
                    ],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });
    }
}
