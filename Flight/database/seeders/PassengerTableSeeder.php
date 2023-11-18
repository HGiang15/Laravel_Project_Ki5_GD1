<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Models\Passenger;


class PassengerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('passengers')->delete(); // xoa DL cũ

        $faker = Faker::create();

        for ($i = 0; $i < 30; $i++) {
            Passenger::create([
                'EmailAddress' => $faker->email,
                'GivenNames' => $faker->firstName,
                'Surname' => $faker->lastName,
            ]);
        }
    }
}
