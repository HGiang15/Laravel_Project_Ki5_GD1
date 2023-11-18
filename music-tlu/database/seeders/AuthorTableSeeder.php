<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Author;
use Illuminate\Support\Facades\DB;

use function imagecreatetruecolor;
use function imagefill;

class AuthorTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('authors')->delete(); // xoa DL cũ

        $faker = Faker::create();

        for($i = 0; $i < 20; $i++) {

            $imageFilename = 'author_' . ($i + 1) . $faker->randomElement(['.jpg', '.png', '.gif', '.pneg']);
    
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
            $imagePath = public_path('/assets/img/author/' . $imageFilename);
            imagejpeg($image, $imagePath);

            Author::create([
                'idAuthor'=> $i + 1,
                'nameAuthor'=> $faker-> sentence(3, true),
                'imgAuthor'=> '/assets/img/author/' . $imageFilename,
            ]);
            imagedestroy($image);

        }
    }
}
