<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxPayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_payers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('temple_user_id');
            $table->unsignedBigInteger('tax_list_id');
            $table->string('payment_bill_no');
            $table->decimal('paid_amount');
            $table->date('paid_date');
            $table->string('paid_to');
            $table->string('receipt_no');

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
        Schema::dropIfExists('tax_payers');
    }
}
