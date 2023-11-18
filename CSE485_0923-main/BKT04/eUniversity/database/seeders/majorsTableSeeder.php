<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Major;
use Illuminate\Support\Facades\DB;

class majorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('majors')->delete(); // xoa DL cũ

        $faker = Faker::create();

        for($i = 0; $i < 20; $i++) {
            Major::create([
                'name'=> $faker-> sentence(3, true),
                'description'=> $faker-> paragraph(7, true),
                'duration'=> 4,
            ]);
        }
    }
}
