<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageAndMediaSeeder extends Seeder
{

    /**
     * @var Factory
     */
    private $faker;

    public function __construct(Factory $faker)
    {
        $this->faker = Factory::create();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // First we need to create pages before menu and content type
        DB::table('pages')->insert([
            'url_name' => 'presentation',
            'menu_name' => 'Présentation',
            'head_title' => $this->faker->text(38),
            'head_meta_keywords' => 'keyword1, keyword2, keyword3, keyword4',
            'head_meta_description' => 'Page de présentation du site',
            'text' => $this->faker->text(1500),
        ]);

        DB::table('pages')->insert([
            'url_name' => 'medias',
            'menu_name' => 'Médias',
            'head_title' => $this->faker->text(50),
            'head_meta_keywords' => 'keyword1, keyword2, keyword3, keyword4',
            'head_meta_description' => 'Page des médias',
            'text' => $this->faker->text(1200),
        ]);

        DB::table('pages')->insert([
            'url_name' => 'contact',
            'menu_name' => 'Contact',
            'head_title' => $this->faker->text(10),
            'head_meta_keywords' => 'keyword1, keyword2, keyword3, keyword4',
            'head_meta_description' => 'Page de contact',
            'text' => $this->faker->text(300),
        ]);

        DB::table('pages')->insert([
            'url_name' => 'login',
            'menu_name' => 'Maître',
            'head_title' => $this->faker->text(20),
            'head_meta_keywords' => null,
            'head_meta_description' => null,
            'text' => $this->faker->text(200),
        ]);

        DB::table('pages')->insert([
            'url_name' => 'mentions',
            'menu_name' => 'Mentions',
            'head_title' => $this->faker->text(30),
            'head_meta_keywords' => 'keyword1, keyword2',
            'head_meta_description' => 'Page des mentions légales',
            'text' => $this->faker->text(2000),
        ]);

        DB::table('pages')->insert([
            'url_name' => 'sitemap',
            'menu_name' => 'Sitemap',
            'head_title' => $this->faker->text(40),
            'head_meta_keywords' => 'keyword1',
            'head_meta_description' => 'Page plan du site',
            'text' => $this->faker->text(500),
        ]);

        // With pages we can create the menus
        $this->generateMenu(1, 3, 'left');
        $this->generateMenu(4, 6, 'bottom');


        // At the end we generate content
        for($i =0; $i <= 10; $i++)
        {
            $title = $this->faker->text(50);
            DB::table('medias')->insert([
                'media_title' => $title,
                'media_thumb' => 'https://fakeimg.pl/200x200/',
                'media_fullsize' => 'https://fakeimg.pl/1460x820/',
                'media_slug' => Str::slug($title),
                'media_link' => null,
                'media_description' => $this->faker->realText(682),
                'media_date' => $this->faker->date('Y-m-d'),
                'category_id' => rand(1, 3),
                'page_id' => 1,
            ]);
        }
    }

    protected function generateMenu(int $start, int $quantity, string $position)
    {
        for($i =$start; $i <= $quantity; $i++) {
            DB::table('menus')->insert([
                'page_id' => $i,
                'menu_position' => $position,
                'menu_order' => $i,
            ]);
        }
    }
}
