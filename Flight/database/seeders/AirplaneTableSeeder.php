<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Models\Airplane;

class AirplaneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('airplanes')->delete(); // xoa DL cũ
        
        $faker = Faker::create();

        for ($i = 0; $i < 30; $i++) {
            Airplane::create([
                'RegistrationNumber'=> $i + 1,
                'ModeNumber' => $faker->unique()->bothify('???###'),
                'Capacity' => $faker->numberBetween(100, 300),
            ]);
        }
    }
}
