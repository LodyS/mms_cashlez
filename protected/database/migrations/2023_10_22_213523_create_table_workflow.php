<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableWorkflow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workflow', function (Blueprint $table) {
            $table->id();
            $table->string('token_applicant')->nullable();
            $table->enum('status_approval', ['Process', 'New Request', 'Updated', 'Rejected', 'Approved', 'Close'])->default('Process');
            $table->string('merchant_op_proses')->nullable();
            $table->string('risk_analis_proses')->nullable();
            $table->string('fitur_pembayaran')->nullable();
            $table->string('token')->nullable();
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
        Schema::dropIfExists('table_workflow');
    }
}
