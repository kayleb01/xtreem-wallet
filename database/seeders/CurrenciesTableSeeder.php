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
            'type' => 'NGN',
            'exchange_rate' => 160,
            'country' => "Nigeria",
            'created_at' => now(),
            'updated_at' => now(),

        ]);
    }
}
