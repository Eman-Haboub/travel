<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RolesAndPermissionsSeeder::class);
        // $this->call(UserSeeder::class);
        $this->call([
            UserSeeder::class,
            TripSeeder::class,
            BookingSeeder::class, // ← أولًا
            HotelSeeder::class,
            HotelBookingSeeder::class, // ← بعد الحجوزات
           NotificationSeeder::class,
           PaymentSeeder::class,
           TicketSeeder::class,
           ReviewSeeder::class,
        ]);
    }
}
