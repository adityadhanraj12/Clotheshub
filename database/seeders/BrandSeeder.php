<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert([
            ['brand' => 'Allen Solly'],
            ['brand' => 'Louis Philippe'],
            ['brand' => 'Peter England'],
            ['brand' => 'Van Heusen'],
            ['brand' => 'W for Woman'],
            ['brand' => 'Biba'],
            ['brand' => 'FabIndia'],
            ['brand' => 'Hidesign'],
            ['brand' => 'Wildcraft'],
            ['brand' => 'Fastrack'],
        ]);
    }
}
