<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //booking_id user_id trip_id ticket_code issue_date valid_from valid_to qr_code_url
               $faker = Faker::create();
                  foreach (range(1, 30) as $i) {
            DB::table('tickets')->insert([
                'booking_id' => rand(1, 30),
                'user_id' => rand(1, 3),
                'trip_id' => rand(1, 6),
                'ticket_code' => strtoupper(Str::random(10)),
                'issue_date' => $faker->dateTimeBetween('-1 month', 'now'),
                'valid_from' => $faker->dateTimeBetween('now', '+1 week'),
                'valid_to' => $faker->dateTimeBetween('+1 week', '+2 weeks'),
                'qr_code_url' => $faker->url,
                'created_at' => now(),
            ]);
        }

    }
}
