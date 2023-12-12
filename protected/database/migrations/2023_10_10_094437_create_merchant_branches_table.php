<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_branches', function (Blueprint $table) {
            $table->id();
            $table->string('token_applicant')->nullable();
            $table->text('alamat')->nullable();
            $table->string('user_id')->nullable();
            $table->string('kebutuhan_edc')->nullable();
            $table->string('status')->nullable();
            $table->string('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchant_branches');
    }
}
