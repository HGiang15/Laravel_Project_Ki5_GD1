<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Models\Flight;
use App\Models\Airplane;


class FlightTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('flights')->delete(); // xoa DL cũ

        $faker = Faker::create();

        $airplaneIds = Airplane::pluck('RegistrationNumber')->toArray();

        for ($i = 0; $i < 30; $i++) {
            Flight::create([
                'FlightNumber' => $i + 1,
                'From' => $faker->city,
                'To' => $faker->city,
                'DepartureDate' => $faker->date,
                'DepartureTime' => $faker->time,
                'ArrivalDate' => $faker->date,
                'ArrivalTime' => $faker->time,
                'idAirplane' => $faker->randomElement($airplaneIds)
                // 'idAirplane' => $faker->numberBetween(1, 10), // Chỉnh số lượng máy bay có sẵn để thích hợp
            ]);
        }

    }
}
