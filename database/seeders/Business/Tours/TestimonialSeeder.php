<?php

namespace Database\Seeders\Business\Tours;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $avatars = [
            'tours/avatars/1.png',
            'tours/avatars/2.png',
            'tours/avatars/3.png',
            'tours/avatars/4.png',
            'tours/avatars/5.png',
            'tours/avatars/6.png',
            'tours/avatars/7.png',
        ];
        $testimonials = [
            [
                'name' => 'Amit Sharma',
                'title' => 'Delhi, India',
                'quotes' => 'Our trip was perfectly organized from start to finish. The team handled everything so smoothly that we never had to worry about hotels, transport, or sightseeing. The guides were knowledgeable and friendly, and every destination felt special. This was one of the most stress-free and enjoyable trips we have ever taken.',
            ],
            [
                'name' => 'Sarah Williams',
                'title' => 'London, UK',
                'quotes' => 'I have traveled to many countries, but this tour genuinely stood out. The itinerary was well balanced with adventure and relaxation. Every hotel was comfortable, and the local experiences felt authentic rather than touristy. I came back with unforgettable memories and new friends.',
            ],
            [
                'name' => 'Rahul Mehta',
                'title' => 'Mumbai, India',
                'quotes' => 'From the first inquiry to the final day of our journey, the service was exceptional. The team was always available to answer questions and make small adjustments as per our needs. It truly felt like a personalized experience rather than a standard package.',
            ],
            [
                'name' => 'Emily Johnson',
                'title' => 'California, USA',
                'quotes' => 'This tour exceeded all my expectations. The destinations were breathtaking, and the planning was flawless. I especially loved how the schedule was flexible enough to explore on our own while still having guidance when needed. Highly recommended for anyone who values quality travel.',
            ],
            [
                'name' => 'Sanjay Verma',
                'title' => 'Bangalore, India',
                'quotes' => 'Everything was well thought out, from airport pickups to daily sightseeing plans. The guides shared interesting stories and local insights that made the trip even more meaningful. I felt safe, comfortable, and well taken care of throughout the journey.',
            ],
            [
                'name' => 'Olivia Martin',
                'title' => 'Sydney, Australia',
                'quotes' => 'Traveling with this company was an absolute pleasure. The attention to detail was impressive, and the team clearly has deep local knowledge. Every day brought something new and exciting, and the overall experience was seamless and enjoyable.',
            ],
            [
                'name' => 'Rohit Singh',
                'title' => 'Chandigarh, India',
                'quotes' => 'This was our first international trip, and we were a bit nervous at first. However, everything was managed professionally, and we felt supported at every step. The itinerary was perfect for first-time travelers and allowed us to truly enjoy the destination.',
            ],
            [
                'name' => 'Jessica Brown',
                'title' => 'Toronto, Canada',
                'quotes' => 'I loved how thoughtfully the trip was planned. There was a perfect mix of sightseeing, cultural experiences, and free time. The accommodations were excellent, and the transport was always punctual and comfortable.',
            ],
            [
                'name' => 'Ankit Patel',
                'title' => 'Ahmedabad, India',
                'quotes' => 'The entire journey felt smooth and well organized. The staff was polite, professional, and genuinely cared about our experience. Every destination had something unique to offer, and the guides ensured we didn’t miss anything important.',
            ],
            [
                'name' => 'Daniel Wilson',
                'title' => 'New York, USA',
                'quotes' => 'This tour gave me a deeper understanding of the culture and lifestyle of the places we visited. It wasn’t just about ticking destinations off a list; it was about experiencing them properly. I would definitely book again.',
            ],

            // --- 20 more ---
            [
                'name' => 'Neha Kapoor',
                'title' => 'Pune, India',
                'quotes' => 'Our family trip was handled beautifully. Traveling with kids can be challenging, but everything was arranged in a very family-friendly way. Comfortable hotels, smooth transfers, and a relaxed itinerary made it a wonderful experience for all of us.',
            ],
            [
                'avatar' => 'avatars/user12.jpg',
                'name' => 'Michael Thompson',
                'title' => 'Berlin, Germany',
                'quotes' => 'What impressed me most was the professionalism of the team. Every detail was communicated clearly, and there were no hidden surprises. The tour delivered exactly what was promised, and even more.',
            ],
            [
                'name' => 'Vikas Yadav',
                'title' => 'Jaipur, India',
                'quotes' => 'The destinations were stunning, and the planning was spot on. We never felt rushed, yet we managed to cover so many beautiful places. It was the perfect balance of exploration and relaxation.',
            ],
            [
                'name' => 'Sophia Lee',
                'title' => 'Seoul, South Korea',
                'quotes' => 'This was one of the most enjoyable travel experiences I’ve had. The local guides were passionate and knowledgeable, which made each destination come alive. I returned home with memories I will cherish forever.',
            ],
            [
                'name' => 'Karan Malhotra',
                'title' => 'Noida, India',
                'quotes' => 'Every part of the trip felt premium and well managed. The accommodations were excellent, and the travel arrangements were smooth. The team was always available whenever we needed assistance.',
            ],
            [
                'avatar' => 'avatars/user16.jpg',
                'name' => 'Laura Garcia',
                'title' => 'Madrid, Spain',
                'quotes' => 'I truly appreciated the personalized approach. The itinerary was adjusted according to our interests, which made the experience even more special. This felt less like a tour and more like a curated journey.',
            ],
            [
                'name' => 'Pooja Nair',
                'title' => 'Kochi, India',
                'quotes' => 'From start to end, everything was seamless. The destinations, hotels, and transport were all top-notch. It was refreshing to travel without any stress or confusion.',
            ],
            [
                'name' => 'James Anderson',
                'title' => 'Manchester, UK',
                'quotes' => 'This tour allowed me to explore places I would never have discovered on my own. The local insights and cultural experiences were the highlight of the trip. Truly a memorable journey.',
            ],
            [
                'name' => 'Harsh Gupta',
                'title' => 'Indore, India',
                'quotes' => 'I was impressed by how organized and transparent everything was. The team delivered exactly what they promised, and the experience exceeded my expectations.',
            ],
            [
                'name' => 'Anna Müller',
                'title' => 'Munich, Germany',
                'quotes' => 'A beautifully planned trip with great attention to detail. The balance between guided tours and free exploration time was perfect. I would gladly recommend this to anyone.',
            ],

            // Last 10
            [
                'name' => 'Ritika Arora',
                'title' => 'Gurgaon, India',
                'quotes' => 'The journey was smooth, comfortable, and enjoyable from beginning to end. The planning and execution were flawless, making this one of our best holidays so far.',
            ],
            [
                'name' => 'Thomas Brown',
                'title' => 'Dublin, Ireland',
                'quotes' => 'I appreciated the honest communication and professional handling throughout the trip. Everything was well organized, and the experience felt truly premium.',
            ],
            [
                'name' => 'Nikhil Jain',
                'title' => 'Udaipur, India',
                'quotes' => 'This trip was exactly what we needed. Beautiful destinations, comfortable stays, and a stress-free experience. I would definitely travel with them again.',
            ],
            [
                'name' => 'Isabella Rossi',
                'title' => 'Milan, Italy',
                'quotes' => 'The tour was thoughtfully designed and perfectly executed. Each day offered something new, and the overall experience was both enriching and relaxing.',
            ],
            [
                'name' => 'Manoj Kumar',
                'title' => 'Patna, India',
                'quotes' => 'Excellent service, friendly staff, and well-planned itineraries. This trip gave us memories that we will cherish for a lifetime.',
            ],
            [
                'name' => 'William Scott',
                'title' => 'Edinburgh, UK',
                'quotes' => 'Everything was handled with great professionalism. The destinations, guides, and accommodations were all outstanding. Highly recommended.',
            ],
            [
                'name' => 'Ayesha Khan',
                'title' => 'Hyderabad, India',
                'quotes' => 'This was a wonderfully organized tour. The team ensured comfort and safety throughout, making the entire experience stress-free and enjoyable.',
            ],
            [
                'name' => 'Lucas Martin',
                'title' => 'Paris, France',
                'quotes' => 'A truly memorable journey. The itinerary was well paced, and the experiences felt authentic and meaningful rather than rushed.',
            ],
            [
                'name' => 'Pradeep Soni',
                'title' => 'Bhopal, India',
                'quotes' => 'From booking to return, everything was smooth and transparent. The trip was exactly as described and even better in reality.',
            ],
            [
                'name' => 'Charlotte Green',
                'title' => 'Auckland, New Zealand',
                'quotes' => 'This tour was a perfect blend of comfort, adventure, and cultural exploration. I came back with incredible memories and a strong desire to travel again.',
            ],
        ];

        foreach ($testimonials as $testimonial) {
            DB::table('testimonials')->insert([
                'avatar' => $avatars[rand(0, count($avatars) - 1)],
                'name' => $testimonial['name'],
                'title' => $testimonial['title'],
                'quotes' => $testimonial['quotes'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
