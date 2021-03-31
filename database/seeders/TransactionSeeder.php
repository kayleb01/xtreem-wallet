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
            'tx_ref' => 'flw_hae2190miu0dg730ndy9nckdo03',
            'device_fingerprint'=> 'hijroas339mhd9384b8f830u5n9u59',
            'ip' => '192.001.209.200',
            'status' => 1,
            'amount' => 2000,
            'user_id' => 2
          ]);
    }
}
