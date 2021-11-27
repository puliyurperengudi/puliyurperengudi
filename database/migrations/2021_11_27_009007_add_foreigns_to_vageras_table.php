<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToVagerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vageras', function (Blueprint $table) {
            $table
                ->foreign('kootam_id')
                ->references('id')
                ->on('kootams')
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
        Schema::table('vageras', function (Blueprint $table) {
            $table->dropForeign(['kootam_id']);
        });
    }
}
