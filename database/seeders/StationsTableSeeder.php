<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stations')->insert([
            ['name' => 'Cairo'],
            ['name' => 'Alexandria'],
            ['name' => 'Giza'],
            ['name' => 'Qalyubia'],
            ['name' => 'Gharbia'],
            ['name' => 'Daqahliya'],
            ['name' => 'Sharqia'],
            ['name' => 'Kafr el-Sheikh'],
            ['name' => 'Beheira'],
            ['name' => 'Ismailia'],
            ['name' => 'Port Said'],
            ['name' => 'Suez'],
            ['name' => 'Red Sea'],
            ['name' => 'Aswan'],
            ['name' => 'Luxor'],
            ['name' => 'Qena'],
            ['name' => 'Sohag'],
            ['name' => 'Minya'],
            ['name' => 'Faiyum'],
            ['name' => 'Beni Suef'],
            ['name' => 'Asyut'],
            ['name' => 'Matruh'],
            ['name' => 'North Sinai'],
            ['name' => 'South Sinai'],
        ]);
    }
}
