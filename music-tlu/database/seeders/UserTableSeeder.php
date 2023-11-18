<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i=0; $i<20; $i++){
            User::create([
                'username' => $faker->userName,
                'password' => bcrypt($faker->password),
                'email' => $faker->email,
                'role' => $faker->randomElement(['admin', 'user', 'author']),
                'status' => $faker->randomElement(['active', 'inactive'])
            ]);
        }
    }
}
