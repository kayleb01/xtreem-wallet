<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            'transaction_id'  => rand(0, 250),
            'currency_id' => 1,
            'action' => 'withdrawal',
            'status' => 1,
            'amount' => 2000,
            'user_id' => 2
          ]);
    }
}
