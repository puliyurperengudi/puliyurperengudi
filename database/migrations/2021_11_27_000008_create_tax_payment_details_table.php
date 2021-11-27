<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxPaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_payment_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tax_payers_id');
            $table->decimal('balance_amount');
            $table->decimal('total_amount_paid');
            $table->decimal('total_tax_amount');

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
        Schema::dropIfExists('tax_payment_details');
    }
}
