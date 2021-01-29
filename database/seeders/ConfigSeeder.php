<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->insert([
            'site_name' => 'Super Site',
            'site_slogan' => 'Mon super site',
            'site_url' => 'http://localhost',
            'site_keywords' => 'mon, super, site',
            'site_description' => 'Mon super site',
        ]);
    }
}
