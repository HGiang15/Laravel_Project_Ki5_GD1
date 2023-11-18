<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Flower;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use function imagecreatetruecolor;
use function imagefill;
class FlowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('flowers')->delete(); // xoa DL cũ

        $faker = Faker::create();

        for ($i = 0; $i < 30; $i++) {
            $imageFilename = 'flower_' . ($i + 1) . $faker->randomElement(['.jpg', '.png', '.gif']);
    
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
            $imagePath = public_path('/assets/img/flowers/' . $imageFilename);
            imagejpeg($image, $imagePath);
    
            Flower::create([
                'id' => $i + 1,
                'name' => $faker->unique()->word,
                'description' => $faker->sentence,
                'image_url' => '/assets/img/flowers/' . $imageFilename,
            ]);
    
            imagedestroy($image);
        }
    }
}
