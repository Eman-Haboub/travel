<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class PaymentSeeder extends Seeder
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
            DB::table('payments')->insert([
                'booking_id' => rand(1, 30),
                'user_id' => rand(1, 3),
                'amount' => $faker->randomFloat(2, 100, 1000),
                'payment_method' => $faker->randomElement(['credit_card', 'paypal', 'bank_transfer']),
                'payment_date' => $faker->dateTimeBetween('-1 week', 'now'),
                'status' => $faker->randomElement(['paid', 'pending', 'failed']),
                'created_at' => now(),
            ]);
        }

    }
}
