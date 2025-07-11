<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class NotificationSeeder extends Seeder
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
            DB::table('notifications')->insert([
                'user_id' => rand(1, 3),
                'title'=> $faker->word(),
                'message' => $faker->sentence,
                'is_read' => $faker->boolean,
                'created_at' => now(),
            ]);
        }
    }
}
