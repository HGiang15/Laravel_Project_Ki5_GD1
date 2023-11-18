<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->delete(); // xoa DL cũ

        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            Department::create([
                'D_No'=> $i + 1,
                'Name' => $faker->company,
                'Location' => $faker->city,
            ]);
        }
    }
}
