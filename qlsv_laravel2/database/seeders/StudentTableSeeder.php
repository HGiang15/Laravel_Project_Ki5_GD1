<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Models\Group;
use App\Models\Student;
class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->delete(); // xoa DL cũ

        $faker = Faker::create();

        $id_groups = Group::all()->pluck('id')->toArray();

        for($i = 0; $i < 50; $i++) {
            Student::create([
                'id'=> $i + 1,
                'nameStudent' => $faker->name,
                'email' => $faker->email,
                'DateOfBirth' => $faker->date,
                'idGroup' => $faker->randomElement($id_groups),
                // 'idGroup' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
