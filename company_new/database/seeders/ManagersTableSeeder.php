<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Manager;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ManagersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('managers')->delete(); // xoa DL cũ

        $faker = Faker::create();

        $departmentIds = Department::all()->pluck('D_No')->toArray();
        $employeeIds = Employee::all()->pluck('id')->toArray();

        for ($i = 0; $i < 30; $i++) {
            Manager::create([
                'idDepartment' => $faker->randomElement($departmentIds),
                'idEmployee' => $faker->randomElement($employeeIds),
                'Since' => $faker->date,
            ]);
        }
    }
}
