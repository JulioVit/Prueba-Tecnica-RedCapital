<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArchiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('archives')->insert([
            'name' => 'Doc_1628533180.txt',
            'user_id' => 2
        ]);
        DB::table('archives')->insert([
            'name' => 'Doc_1628535047.txt',
            'user_id' => 2
        ]);
        DB::table('archives')->insert([
            'name' => 'Doc_1628535746.txt',
            'user_id' => 3
        ]);
        DB::table('archives')->insert([
            'name' => 'Doc_1628535806.txt',
            'user_id' => 3
        ]);
    }
}
