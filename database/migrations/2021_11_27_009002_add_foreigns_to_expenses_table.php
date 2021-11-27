<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table
                ->foreign('tax_list_id')
                ->references('id')
                ->on('tax_lists')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('expense_type_id')
                ->references('id')
                ->on('expense_types')
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
        Schema::table('expenses', function (Blueprint $table) {
            $table->dropForeign(['tax_list_id']);
            $table->dropForeign(['expense_type_id']);
        });
    }
}
