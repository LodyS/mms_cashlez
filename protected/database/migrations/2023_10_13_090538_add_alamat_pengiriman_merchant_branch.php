<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAlamatPengirimanMerchantBranch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('merchant_branches', function (Blueprint $table) {
            $table->string('alamat_pengiriman')->nullable();
            $table->string('nama_pic')->nullable();
            $table->string('no_tlp_pic')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('merchant_branches', function (Blueprint $table) {
            //
        });
    }
}
