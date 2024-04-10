<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                "image_profile" => "",
                "full_name" => "User1",
                "username" => "user1",
                "email" => "user1@gmail.com",
                "password" => "12345",
                "birth_date" => "2000-01-31",
                "phone_number" => "+62812345678900",
            ],
            [
                "image_profile" => "",
                "full_name" => "Admin1",
                "username" => "admin1",
                "email" => "admin1@gmail.com",
                "password" => "12345",
                "birth_date" => "2000-01-31",
                "phone_number" => "+62812345678900",
                "roles" => "super_admin",
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
