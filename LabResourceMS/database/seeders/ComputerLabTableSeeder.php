<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\ComputerLab;
use Illuminate\Support\Facades\DB;

class ComputerLabTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('computer_labs')->delete(); // xoa DL cũ

        $faker = Faker::create();

        for($i = 0; $i < 20; $i++) {
            ComputerLab::create([
                'LabID'=> $i + 1,
                'LabName'=> $faker-> sentence(2, true),
                'NumberOfComputers'=> $faker->randomElement(['1', '2', '3', '4', '5']),
                'Status'=> $faker-> sentence(1, true),
                'Description' => $faker-> paragraph(3, true)
            ]);
        }
    }
}
