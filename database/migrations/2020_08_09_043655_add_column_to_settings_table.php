<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('hotline');
            $table->string('address');
            $table->longText('time_open');
            $table->longText('google_map');
            $table->string('link_fb');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('link_fb');
            $table->dropColumn('google_map');
            $table->dropColumn('time_open');
            $table->dropColumn('address');
            $table->dropColumn('hotline');
        });
    }
}
