<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToTaxPayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tax_payers', function (Blueprint $table) {
            $table
                ->foreign('temple_user_id')
                ->references('id')
                ->on('temple_users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('tax_list_id')
                ->references('id')
                ->on('tax_lists')
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
        Schema::table('tax_payers', function (Blueprint $table) {
            $table->dropForeign(['temple_user_id']);
            $table->dropForeign(['tax_list_id']);
        });
    }
}
