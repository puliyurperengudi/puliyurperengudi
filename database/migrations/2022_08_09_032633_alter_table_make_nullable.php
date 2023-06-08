<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterTableMakeNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('alter table temple_users modify kootam_id bigint unsigned null;');
        DB::statement('alter table temple_users modify caste_id bigint unsigned null;');
        DB::statement('alter table temple_users modify vagera varchar(255) null;');

        DB::statement('alter table temple_users modify country_id mediumint unsigned null;');
        DB::statement('alter table temple_users modify state_id mediumint unsigned null;');
        DB::statement('alter table temple_users modify city_id mediumint unsigned null;');
        DB::statement('alter table temple_users modify village_id bigint unsigned null;');

        DB::statement('alter table donations modify kootam_id bigint unsigned null;');
        DB::statement('alter table donations modify caste_id bigint unsigned null;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
