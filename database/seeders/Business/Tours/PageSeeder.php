<?php

namespace Database\Seeders\Business\Tours;

use Illuminate\Database\Seeder;
use App\Models\Business\Tours\Page;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'page' => 'home',
                'title' => 'Welcome to Our Travel Platform',
                'meta_title' => 'Best Travel & Tour Packages | Explore Top Destinations',
                'meta_description' => 'Discover curated travel destinations, affordable tour packages, and unforgettable holiday experiences with trusted experts.',
                'meta_keywords' => 'travel, tour packages, destinations, holidays, trips',
                'canonical_url' => url('/'),
                'og_title' => 'Explore the World with Us',
                'og_description' => 'Plan your next adventure with handpicked destinations and tour packages.',
                'og_image' => 'seo/home-og.jpg',
                'twitter_title' => 'Best Travel & Tour Packages',
                'twitter_description' => 'Explore destinations and book unforgettable trips.',
                'twitter_image' => 'seo/home-twitter.jpg',
            ],

            [
                'page' => 'about',
                'title' => 'About Us',
                'meta_title' => 'About Us | Trusted Travel Experts',
                'meta_description' => 'Learn about our mission, values, and the team dedicated to creating memorable travel experiences.',
                'meta_keywords' => 'about travel company, travel experts',
                'canonical_url' => url('/about'),
                'og_title' => 'About Our Travel Company',
                'og_description' => 'We create meaningful journeys powered by local expertise.',
                'og_image' => 'seo/about-og.jpg',
                'twitter_title' => 'About Us',
                'twitter_description' => 'Meet the team behind unforgettable travel experiences.',
                'twitter_image' => 'seo/about-twitter.jpg',
                'content' => '
                    <h1>Who We Are</h1>
                    <p>We are a passionate team of travel professionals focused on delivering authentic and seamless travel experiences.</p>
                    <p>Our goal is to connect travelers with destinations in a meaningful, responsible, and memorable way.</p>
                ',
                'has_content' => true,
            ],
            [
                'page' => 'explore',
                'title' => 'Explore Tour Packages',
                'meta_title' => 'Explore Tour Packages | Best Travel Deals & Holiday Packages',
                'meta_description' => 'Discover handpicked tour packages with the best prices. Explore destinations, itineraries, and unforgettable travel experiences.',
                'meta_keywords' => 'tour packages, travel packages, holiday packages, explore tours, travel deals',
                'canonical_url' => url('/explore-packages'),
                'og_title' => 'Explore Our Tour Packages',
                'og_description' => 'Browse exciting tour packages and find your perfect travel experience.',
                'og_image' => 'seo/explore-packages-og.jpg',
                'twitter_title' => 'Explore Tour Packages',
                'twitter_description' => 'Find the best tour and holiday packages for your next adventure.',
                'twitter_image' => 'seo/explore-packages-twitter.jpg',
            ],

            [
                'page' => 'contact',
                'title' => 'Contact Us',
                'meta_title' => 'Contact Us | Talk to Our Travel Experts',
                'meta_description' => 'Have questions or need a custom travel plan? Contact our experts for personalized assistance.',
                'meta_keywords' => 'contact travel company, travel help',
                'canonical_url' => url('/contact'),
                'og_title' => 'Contact Our Travel Experts',
                'og_description' => 'We are here to help you plan your perfect trip.',
                'og_image' => 'seo/contact-og.jpg',
                'twitter_title' => 'Contact Us',
                'twitter_description' => 'Reach out for personalized travel planning.',
                'twitter_image' => 'seo/contact-twitter.jpg',
            ],

            [
                'page' => 'privacy',
                'title' => 'Privacy Policy',
                'meta_title' => 'Privacy Policy | Your Data Matters',
                'meta_description' => 'Learn how we collect, use, and protect your personal information.',
                'meta_keywords' => 'privacy policy, data protection',
                'canonical_url' => url('/privacy-policy'),
                'content' => '
                    <h1>Privacy Policy</h1>
                    <p>Your privacy is important to us. This policy explains how we handle your personal data responsibly.</p>
                ',
                'has_content' => true,
            ],

            [
                'page' => 'terms',
                'title' => 'Terms & Conditions',
                'meta_title' => 'Terms & Conditions | Website Usage & Bookings',
                'meta_description' => 'Review the terms governing website usage, bookings, and services.',
                'meta_keywords' => 'terms and conditions, booking terms',
                'canonical_url' => url('/terms-conditions'),
                'content' => '
                    <h1>Terms & Conditions</h1>
                    <p>By using our website, you agree to comply with the following terms and conditions.</p>
                ',
                'has_content' => true,
            ],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        };
    }
}
