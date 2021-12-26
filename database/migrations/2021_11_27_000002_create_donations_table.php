<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('mobile_number');
            $table->string('father_name');
            $table->text('address');
            $table->string('receipt_no');
            $table->decimal('last_paid_amount')->nullable();
            $table->decimal('last_paid_to')->nullable();
            $table->unsignedBigInteger('tax_list_id');
            $table->unsignedBigInteger('kootam_id');
            $table->unsignedBigInteger('vagera_id');
            $table->unsignedBigInteger('caste_id');

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
        Schema::dropIfExists('donations');
    }
}
