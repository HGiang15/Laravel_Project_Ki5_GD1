<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Department;
use App\Models\Employee;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->delete(); // xoa DL cũ

        $faker = Faker::create();

        $departmentIds = Department::all()->pluck('D_No')->toArray();
        $employeeIds = Employee::all()->pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) {
            Project::create([
                'P_No'=> $i + 1,
                'Name' => $faker->sentence(3),
                'Location' => $faker->address,
                'idDepartment' => $faker->randomElement($departmentIds),
                'idEmployee' => $faker->randomElement($employeeIds),
            ]);
        }
    }
}
