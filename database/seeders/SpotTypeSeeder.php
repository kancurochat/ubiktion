<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpotTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spot_types')->insert([
            'type' => 'verde'
        ]);
        DB::table('spot_types')->insert([
            'type' => 'negro'
        ]);
    }
}
