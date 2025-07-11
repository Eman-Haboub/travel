<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HotelSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('hotels')->insert([
            [
                'name' => 'Al Nakheel Hotel',
                'location' => 'Maldives',
                'stars' => 5,
                'description' => 'A luxury hotel offering five-star services and a strategic location.',
                'image' => 'https://i.pinimg.com/736x/96/df/b0/96dfb083f5b2bc79ad5a9587a9aeb209.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Al Salam Hotel',
                'location' => 'Turkey',
                'stars' => 4,
                'description' => 'Located near the Corniche, offering excellent services for families.',
                'image' => 'https://i.pinimg.com/736x/10/f6/5d/10f65de06f9d4aa6b99385d40fe27ae5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Al Bahr Hotel',
                'location' => 'Italy',
                'stars' => 3,
                'description' => 'Comfortable budget-friendly accommodation near the waterfront.',
                'image' => 'https://i.pinimg.com/736x/3f/21/a3/3f21a311d458c4861021e22de86012ae.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Al Khaleej Hotel',
                'location' => 'Paris',
                'stars' => 4,
                'description' => 'A distinctive hotel with views of the Arabian Gulf and excellent service.',
                'image' => 'https://i.pinimg.com/736x/18/88/b0/1888b087cde0b184b7abff67f29fdba1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Al Waha Hotel',
                'location' => 'Cairo',
                'stars' => 5,
                'description' => 'Luxurious comfort and proximity to the Prophet’s Mosque.',
                'image' => 'https://i.pinimg.com/736x/46/14/92/461492f7ccff235443a1cb9e3f776341.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Al Ramal Hotel',
                'location' => 'Dubai, UAE',
                'stars' => 4,
                'description' => 'Modern design and excellent services in the heart of Dubai.',
                'image' => 'https://i.pinimg.com/736x/46/c3/01/46c3017ec9153adcdf76c1eb1d2c57c2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
