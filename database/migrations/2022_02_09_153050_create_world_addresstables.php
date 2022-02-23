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
//        ini_set('memory_limit', '-1');
//        \DB::unprepared( file_get_contents( "database/world.sql" ) );

        Schema::create('countries', function (Blueprint $table) {
            $table->unsignedMediumInteger('id')->autoIncrement();
            $table->string('name');
            $table->string('iso3');
            $table->string('numeric_code');
            $table->string('iso2');
            $table->string('phonecode');
            $table->string('capital');
            $table->string('currency');
            $table->string('currency_name');
            $table->string('currency_symbol');
            $table->string('tld');
            $table->string('native');
            $table->string('region');
            $table->string('subregion');
            $table->string('timezones');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 10, 8);
            $table->string('emoji');
            $table->string('emojiU');
            $table->timestamps();
            $table->tinyInteger('flag');
            $table->string('wikiDataId');
        });

        Schema::create('states', function (Blueprint $table) {
            $table->unsignedMediumInteger('id')->autoIncrement();
            $table->string('name');
            $table->unsignedMediumInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('CASCADE');
            $table->string('country_code');
            $table->string('fips_code');
            $table->string('iso2');
            $table->string('type');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 10, 8);
            $table->timestamps();
            $table->tinyInteger('flag');
            $table->string('wikiDataId');
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->unsignedMediumInteger('id')->autoIncrement();
            $table->string('name');
            $table->unsignedMediumInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('CASCADE');
            $table->unsignedMediumInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('CASCADE');
            $table->string('country_code');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 10, 8);
            $table->timestamps();
            $table->tinyInteger('flag');
            $table->string('wikiDataId');
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
