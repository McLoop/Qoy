<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToRequestResponseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('request_response', function (Blueprint $table) {
            $table->integer('user_id')->after('id')->unsigned();
            $table->integer('property_request_id')->after('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('property_request_id')->references('id')->on('property_request');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('request_response', function (Blueprint $table) {
            //
        });
    }
}
