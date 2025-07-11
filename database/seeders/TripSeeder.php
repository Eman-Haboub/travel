<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trips = [
            [

                'destination' => 'Dubai',
                'start_date' => '2025-08-10',
                'end_date'   => '2025-08-15',
                'description' => 'Enjoy a wonderful trip to the enchanting city of Dubai.',
                'image'      => 'https://i.pinimg.com/736x/64/0e/c3/640ec39a093f78068ce041dd95b03a16.jpg',
                'price'      => 450,
                'created_at' => now(),
            ],
            [
                'destination' => 'Cairo',
                'start_date' => '2025-09-05',
                'end_date'   => '2025-09-12',
                'description' => 'A tour of archaeological and historical landmarks in Cairo.',
                'image'      => 'https://i.pinimg.com/736x/d5/ad/76/d5ad762ad1bb852a78252c2e11fd9edf.jpg',
                'price'      => 300,
                'created_at' => now(),
            ],
            [
                'destination' => 'Paris',
                'start_date' => '2025-10-01',
                'end_date'   => '2025-10-07',
                'description' => 'Visit the Eiffel Tower and enjoy a romantic tour in Paris.',
                'image'      => 'https://i.pinimg.com/736x/33/ef/4a/33ef4a340ba6862c98f7ced6d6f415dd.jpg',
                'price'      => 550,
                'created_at' => now(),
            ],
            [
                'destination' => 'Italy',
                'start_date' => '2025-10-01',
                'end_date'   => '2025-10-07',
                'description' => 'Explore the timeless beauty of Italy, from the romantic canals of Rome.',
                'image'      => 'https://i.pinimg.com/736x/af/d4/42/afd44281ecf3eea61b51c645c54d576b.jpg',
                'price'      => 450,
                'created_at' => now(),
            ],
            [
                'destination' => 'Turkey',
                'start_date' => '2025-10-01',
                'end_date'   => '2025-10-07',
                'description' => 'Visit the Eiffel Tower and enjoy a romantic tour in Turkey.',
                'image'      => 'https://i.pinimg.com/736x/60/b8/bb/60b8bb47feb2dc90eeb3c91c084f351d.jpg',
                'price'      => 850,
                'created_at' => now(),
            ],
            [
                'destination' => 'Maldives',
                'start_date' => '2025-10-01',
                'end_date'   => '2025-10-07',
                'description' => 'Visit the Eiffel Tower and enjoy a romantic tour in Maldives.',
                'image'      => 'https://i.pinimg.com/736x/48/3f/81/483f8132409571a72296e2612f90bae1.jpg',
                'price'      => 570,
                'created_at' => now(),
            ],
        ];


        DB::table('trips')->insert($trips);
    }
}
