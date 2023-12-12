<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReturnMerchantOpsDataMerchant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_merchants', function (Blueprint $table) {
            $table->string('return_merchant_ops')->nullable();
            $table->string('status_tanda_tangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_merchants', function (Blueprint $table) {
            //
        });
    }
}
