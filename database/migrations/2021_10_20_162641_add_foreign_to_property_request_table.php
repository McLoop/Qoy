<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToPropertyRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('property_request', function (Blueprint $table) {
            $table->integer('user_id')->after('id')->unsigned();
            $table->integer('thing_id')->after('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('thing_id')->references('thing_id')->on('thing');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('property_request', function (Blueprint $table) {
            //
        });
    }
}
