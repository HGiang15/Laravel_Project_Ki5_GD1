<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Flower;
use App\Models\Region;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('regions')->delete(); // xoa DL cũ

        $faker = Faker::create();
        $idFlowers = Flower::pluck('id')->toArray();
        
        for ($i = 0; $i < 10; $i++) {
            Region::create([
                'flower_id' => $faker->randomElement($idFlowers),
                'region_name' => $faker->city,
            ]);
        }
    }
}
