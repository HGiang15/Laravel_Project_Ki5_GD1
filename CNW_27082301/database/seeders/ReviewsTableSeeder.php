<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\User;
use App\Models\Book;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->delete(); // xoa DL cũ
        
        $faker = Faker::create();

        $users = User::pluck('id')->toArray();
        $books = Book::pluck('BookID')->toArray();

        for ($i = 0; $i < 10; $i++) {
            Review::create([
                'BookID' => $faker->randomElement($books),
                'UserID' => $faker->randomElement($users),
                'Rating' => $faker->numberBetween(1, 5),
                'ReviewText' => $faker->paragraph,
                'ReviewDate' => $faker->date,
            ]);
        }

    }
}
