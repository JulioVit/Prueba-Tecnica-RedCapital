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
            'name' => 'Pablo',
            'email' => "pablo.julio.vit@gmail.com",
            'password' => Hash::make('1a2s3d4f'),
            'role' => "Admin"
        ]);
        DB::table('users')->insert([
            'name' => 'Alfredo',
            'email' => "pjv001@alumnos.ucn.cl",
            'password' => Hash::make('qawsedrf'),
            'role' => "Usuario"
        ]);
        DB::table('users')->insert([
            'name' => 'Maria',
            'email' => "pablo.julio@ce.ucn.cl",
            'password' => Hash::make('1234asdf'),
            'role' => "Usuario"
        ]);
    }
}
