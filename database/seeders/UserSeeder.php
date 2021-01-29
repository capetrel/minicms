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
            'password' => Hash::make('@Efil-321'),
            'remember_token' => null,
        ]);
    }
}
