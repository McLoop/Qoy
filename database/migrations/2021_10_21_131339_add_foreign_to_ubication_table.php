<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToUbicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ubication', function (Blueprint $table) {
            $table->integer('region_id')->after('id')->unsigned();
            $table->integer('zone_id')->after('region_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('region');
            $table->foreign('zone_id')->references('id')->on('zone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ubication', function (Blueprint $table) {
            //
        });
    }
}
