<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTempleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('temple_users', function (Blueprint $table) {
            $table->unsignedMediumInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('CASCADE');
            $table->unsignedMediumInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('CASCADE');
            $table->unsignedMediumInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('CASCADE');
            $table->unsignedBigInteger('village_id');
            $table->foreign('village_id')->references('id')->on('villages')->onDelete('CASCADE');
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
            $table->dropForeign(['country_id', 'state_id', 'city_id', 'village_id']);
            $table->dropColumn(['country_id', 'state_id', 'city_id', 'village_id']);
        });
    }
}
