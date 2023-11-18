<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\ComputerLab;
use App\Models\Computer;
use Illuminate\Support\Facades\DB;

class ComputerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('computers')->delete(); // xoa DL cũ

        $faker = Faker::create();

        $idComputerLab = ComputerLab::pluck('LabID')->toArray();


        for($i = 0; $i < 20; $i++) {
            Computer::create([
                'ComputerID'=> $i + 1,
                'LabID'=> $faker->randomElement($idComputerLab),
                'ComupterName'=> $faker-> sentence(2, true),
                'Configuration' => $faker-> paragraph(3, true),
                'ComputerStatus'=> $faker-> sentence(1, true),
            ]);
        }
    }
}
