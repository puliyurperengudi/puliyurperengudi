<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedMediumInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('CASCADE');
            $table->unsignedMediumInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('CASCADE');
            $table->unsignedMediumInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('CASCADE');
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
        Schema::dropIfExists('villages');
    }
}
