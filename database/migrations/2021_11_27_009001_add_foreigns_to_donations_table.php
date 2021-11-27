<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donations', function (Blueprint $table) {
            $table
                ->foreign('tax_list_id')
                ->references('id')
                ->on('tax_lists')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('kootam_id')
                ->references('id')
                ->on('kootams')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('vagera_id')
                ->references('id')
                ->on('vageras')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('caste_id')
                ->references('id')
                ->on('castes')
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
        Schema::table('donations', function (Blueprint $table) {
            $table->dropForeign(['tax_list_id']);
            $table->dropForeign(['kootam_id']);
            $table->dropForeign(['vagera_id']);
            $table->dropForeign(['caste_id']);
        });
    }
}
