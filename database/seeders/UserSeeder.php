<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('123'),
            'phone' => '123456789',

        ]);
        $admin->assignRole('admin');

        $editor = User::create([
            'name' => 'Editor User',
            'email' => 'editor@example.com',
            'password' => Hash::make('123'),
            'phone' => '123456789',

        ]);
        $editor->assignRole('editor');

        $users = [
            ['name' => 'User One', 'email' => 'user1@example.com', 'phone' => '111111111'],
            ['name' => 'User Two', 'email' => 'user2@example.com', 'phone' => '222222222'],
            ['name' => 'User Three', 'email' => 'user3@example.com', 'phone' => '333333333'],
        ];

        foreach ($users as $data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make('123'),
                'phone' => $data['phone'],
            ]);

            $user->assignRole('user');
        }

    }
}
