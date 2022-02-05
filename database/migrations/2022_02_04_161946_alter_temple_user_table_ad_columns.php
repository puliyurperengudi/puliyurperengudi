<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTempleUserTableAdColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('temple_users', function (Blueprint $table) {
            $table->dropForeign(['vagera_id']);
            $table->dropColumn(['vagera_id']);
            $table->string('vagera')->after('caste_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('temple_users', function (Blueprint $table) {
            $table->dropColumn(['vagera']);
        });
    }
}
