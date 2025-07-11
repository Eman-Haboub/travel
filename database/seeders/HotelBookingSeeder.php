<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelBookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       $faker = Faker::create();

foreach (range(1, 20) as $i) {
    DB::table('hotelbookings')->insert([
        'booking_id' => rand(1, 30),
        'hotel_id' => rand(1, 6),
        'user_id' => rand(1, 3),
        'check_in_date' => $faker->dateTimeBetween('+1 days', '+5 days'),
        'check_out_date' => $faker->dateTimeBetween('+6 days', '+10 days'),
        'room_type' => $faker->randomElement(['Deluxe', 'Standard', 'Suite']),
        'status' => $faker->randomElement(['pending', 'confirmed', 'cancelled']),
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}

    }
}
