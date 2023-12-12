<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvetoryControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invetory_controls', function (Blueprint $table) {
            $table->id();
            $table->string('token_applicant')->nullable();
            $table->string('user_id')->nullable();
            $table->text('catatan')->nullable();
            $table->string('status')->nullable();
            $table->string('jenis')->nullable();
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
        Schema::dropIfExists('invetory_controls');
    }
}
