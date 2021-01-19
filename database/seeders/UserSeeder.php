<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => 'Admin',
            'lastname' => 'Efil',
            'name' => 'adminefil',
            'email' => 'capetrelluzzi@efil.fr',
            'email_verified_at' => null,
            'password' => '$2y$10$WrA491vh1AjYfQUFf35Fo.3CCyhFm6aOCiCrJS.nqhR...',
            'remember_token' => null,
        ]);
    }
}
