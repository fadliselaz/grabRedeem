<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSchedulesFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropColumn('show_start');
            $table->dropColumn('show_end');
            $table->dropColumn('qty');
            $table->integer('play_order')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dateTime('show_start')->nullable(false);
            $table->dateTime('show_end')->nullable(false);
            $table->integer('qty')->nullable(false);
            $table->dropColumn('play_order');
        });
    }
}
