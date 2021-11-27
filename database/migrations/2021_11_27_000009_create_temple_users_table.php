<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempleUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temple_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('father_name');
            $table->text('address');
            $table->string('mobile_number');
            $table->unsignedBigInteger('kootam_id');
            $table->unsignedBigInteger('vagera_id');
            $table->unsignedBigInteger('caste_id');

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
        Schema::dropIfExists('temple_users');
    }
}
