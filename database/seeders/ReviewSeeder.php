<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {$faker = Faker::create();

        foreach (range(1, 25) as $i) {
            DB::table('reviews')->insert([
                'user_id' => rand(1, 3),
                'booking_id' => rand(1, 30),
                'trip_id' => rand(1, 6),
                'rating' => rand(1, 5),
                'comment' => $faker->sentence,
                'created_at' => now(),
            ]);
        }


    }
}
