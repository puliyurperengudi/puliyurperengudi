<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorldAddresstables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('countries', function (Blueprint $table) {
            $table->unsignedMediumInteger('id')->autoIncrement();
            $table->string('name');
        });

        Schema::create('states', function (Blueprint $table) {
            $table->unsignedMediumInteger('id')->autoIncrement();
            $table->string('name');
            $table->unsignedMediumInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('CASCADE');
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->unsignedMediumInteger('id')->autoIncrement();
            $table->string('name');
            $table->unsignedMediumInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('CASCADE');
            $table->unsignedMediumInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
        Schema::dropIfExists('states');
        Schema::dropIfExists('countries');
    }
}
