<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i =1; $i <= 3; $i++) {
            $name = 'Catégorie' . (string)$i;
            $slug = Str::slug($name);
            DB::table('categories')->insert([
                'category_name' => $name,
                'category_slug' => $slug,
            ]);
        }
    }
}
