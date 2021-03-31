<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTransactionRefToTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
           $table->string('tx_ref');
           $table->string('flw_ref');
           $table->string('device_fingerprint');
           $table->ipAddress('ip');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('tx_ref');
            $table->string('device_fingerprint')->nullable();
            $table->ipAddress('ip')->nullable();
        });
    }
}
