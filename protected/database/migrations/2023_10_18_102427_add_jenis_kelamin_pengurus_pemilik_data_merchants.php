<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJenisKelaminPengurusPemilikDataMerchants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_merchants', function (Blueprint $table) {
            $table->string('jenis_kelamin_pemilik')->nullable();
            $table->string('jenis_kelamin_pengurus')->nullable();
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
