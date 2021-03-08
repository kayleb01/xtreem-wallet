<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            'type' => 'GHC',
            'exchange_rate' =>  66.22,
            'country' => "Ghana",
            'created_at' => now(),
            'updated_at' => now(),

        ]);
    }
}
