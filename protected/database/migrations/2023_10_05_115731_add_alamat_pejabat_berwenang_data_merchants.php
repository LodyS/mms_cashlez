<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAlamatPejabatBerwenangDataMerchants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_merchants', function (Blueprint $table) {
            $table->text('alamat_pejabat_berwenang')->nullable();
            $table->string('npwp_merchant_badan_usaha')->nullable();
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
