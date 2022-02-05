<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDonationsTableAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->string('vagera')->after('kootam_id');
            $table->dropForeign(['vagera_id']);
            $table->unsignedBigInteger('temple_user_id');
            $table->foreign('temple_user_id')->references('id')->on('temple_users')->onDelete('CASCADE');
            $table->dropColumn(['name','mobile_number','father_name','address', 'vagera_id', 'last_paid_to']);
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
            $table->dropForeign(['temple_user_id']);
            $table->dropColumn(['temple_user_id']);
        });
    }
}
