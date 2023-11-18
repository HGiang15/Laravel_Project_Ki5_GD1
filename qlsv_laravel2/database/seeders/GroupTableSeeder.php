<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Models\Group;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('groups')->delete(); // xoa DL cũ

        $faker = Faker::create();

        for($i = 0; $i < 30; $i++) {
            Group::create([
                'id'=> $i + 1,
                'nameGroup' => $faker->city(),
            ]);
        }
        
    }
}
