<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


use function imagecreatetruecolor;
use function imagefill;
class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articles')->delete(); // xoa DL cũ

        $faker = Faker::create();
        $idCategories = Category::pluck('idCategory')->toArray();

        $idAuthors = Author::pluck('idAuthor')->toArray();

        for($i = 0; $i < 5; $i++) {
            $imageFilename = 'article_' . ($i + 1) . $faker->randomElement(['.jpg', '.png', '.gif', '.pneg']);
    
            $image = imagecreatetruecolor(300, 300);
            $backgroundColor = imagecolorallocate($image, 204, 204, 204);
            imagefill($image, 0, 0, $backgroundColor); // điển màu vào ảnh từ góc trên trái x,y
    
            $textColor = imagecolorallocate($image, 0, 0, 0);
            $text = $faker->word;
            $fontSize = 48;
            $textWidth = imagefontwidth($fontSize) * strlen($text);
            $textHeight = imagefontheight($fontSize);
            $x = (imagesx($image) - $textWidth) / 2;
            $y = (imagesy($image) - $textHeight) / 2;
    
            imagestring($image, $fontSize, $x, $y, $text, $textColor);
    
            // Lưu ảnh vào thư mục lưu trữ
            $imagePath = public_path('/assets/img/article/' . $imageFilename);
            imagejpeg($image, $imagePath);


            Article::create([
                'idArticle'=> $i + 1,
                'title'=> $faker-> sentence(10, true),
                'nameSong'=> $faker-> sentence(5, true),
                'idCategory'=> $faker->randomElement($idCategories),
                'summary'=> $faker-> paragraph(1, true),
                'content'=> $faker-> paragraph(3, true),
                'idAuthor'=> $faker->randomElement($idAuthors),
                'imgArticle'=> '/assets/img/article/' . $imageFilename,
            ]);
        }
    }
}
