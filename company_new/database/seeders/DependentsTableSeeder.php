<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Models\Dependent;
use App\Models\Employee;

class DependentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dependents')->delete(); // xoa DL cũ

        $faker = Faker::create();

        $employeeIds = Employee::all()->pluck('id')->toArray();


        for ($i = 0; $i < 50; $i++) {
            Dependent::create([
                'D_name' => $faker->name,
                'Gender' => $faker->randomElement(['Male', 'Female', 'Other']),
                'Relationship'  => $faker->word,
                'idEmployee' => $faker->randomElement($employeeIds),
            ]);
        }
    }
}
