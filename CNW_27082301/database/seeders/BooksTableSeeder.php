<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

use function imagecreatetruecolor;
use function imagefill;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->delete(); // xoa DL cũ

        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {

            $imageFilename = 'book_' . ($i + 1) . $faker->randomElement(['.jpg', '.png', '.gif', '.svg', '.pneg']);
    
            $image = imagecreatetruecolor(300, 300);
            $backgroundColor = imagecolorallocate($image, 204, 204, 204);
            imagefill($image, 0, 0, $backgroundColor);
    
            $textColor = imagecolorallocate($image, 0, 0, 0);
            $text = $faker->word;
            $fontSize = 48;
            $textWidth = imagefontwidth($fontSize) * strlen($text);
            $textHeight = imagefontheight($fontSize);
            $x = (imagesx($image) - $textWidth) / 2;
            $y = (imagesy($image) - $textHeight) / 2;
    
            imagestring($image, $fontSize, $x, $y, $text, $textColor);
    
            // Lưu ảnh vào thư mục lưu trữ
            $imagePath = public_path('/assets/img/books/' . $imageFilename);
            imagejpeg($image, $imagePath);
    

            Book::create([
                'BookID'=> $i + 1,
                'Title' => $faker->sentence,
                'Author' => $faker->name,
                'Genre' => $faker->word,
                'PublicationYear' => $faker->year,
                'ISBN' => $faker->isbn13,
                'ConvertImageURL' => '/assets/img/books/' . $imageFilename,
            ]);
            imagedestroy($image);

        }

    }
}
