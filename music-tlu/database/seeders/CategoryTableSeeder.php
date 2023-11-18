<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('categories')->delete(); // xoa DL cũ

        $faker = Faker::create();

        for($i = 0; $i < 20; $i++) {
            Category::create([
                'idCategory'=> $i + 1,
                'nameCategory'=> $faker-> sentence(2, true)
            ]);
        }
    }
}
