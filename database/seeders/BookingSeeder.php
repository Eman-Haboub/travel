<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                        $faker = Faker::create();
   foreach (range(1, 30) as $i) {
            DB::table('bookings')->insert([
                'user_id' => rand(1, 3),
                'trip_id' => rand(1, 6),
                'booking_type' => $faker->randomElement(['flight', 'hotel', 'package','tour','cruise','experience']),
                'created_at' => now(),
            ]);
        }
    }
}
