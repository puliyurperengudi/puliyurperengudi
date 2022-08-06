<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTableAddPrefixColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('temple_users', function (Blueprint $table) {
            $table->string('user_id_prefix')->nullable()->after('id');
        });

        \App\Models\TempleUser::where('id', '>',  0)->update(['user_id_prefix' => \App\Models\TempleUser::NORMAL_USER_ID_PREFIX]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('temple_users', function (Blueprint $table) {
            $table->dropColumn(['user_id_prefix']);
        });
    }
}
