<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'nombre' => 'Pablo',
            'apellido' => 'Julio',
            'rut' => "18897473-2",
            'correo electrónico' => "pablo.julio.vit@gmail.com",
            'contraseña' => ''
        ]);
    }
}
