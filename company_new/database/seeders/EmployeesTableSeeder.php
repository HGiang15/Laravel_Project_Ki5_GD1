<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Models\Department;
use App\Models\Employee;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->delete(); // xoa DL cũ

        $faker = Faker::create();

        $departmentIds = Department::pluck('D_No')->toArray();

        for ($i = 0; $i < 50; $i++) {
            Employee::create([
                'id'=> $i + 1,
                'Name' => $faker->name,
                'Address' => $faker->address,
                'Gender' => $faker->randomElement(['Male', 'Female', 'Other']),
                'DateOfBirth' => $faker->date,
                'DateOfJob' => $faker->date,
                'idDepartment' => $faker->randomElement($departmentIds),
            ]);
        }
    }
}
