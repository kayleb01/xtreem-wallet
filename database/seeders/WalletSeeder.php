<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wallets')->insert([
            'user_id' => 2,
            'balance' => 200,
            'currency_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
