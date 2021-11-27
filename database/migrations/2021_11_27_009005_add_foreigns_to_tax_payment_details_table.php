<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToTaxPaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tax_payment_details', function (Blueprint $table) {
            $table
                ->foreign('tax_payers_id')
                ->references('id')
                ->on('tax_payers')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tax_payment_details', function (Blueprint $table) {
            $table->dropForeign(['tax_payers_id']);
        });
    }
}
