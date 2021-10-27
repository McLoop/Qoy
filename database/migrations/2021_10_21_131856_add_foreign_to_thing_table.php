<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToThingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('thing', function (Blueprint $table) {
            $table->integer('post_id')->after('thing_state')->unsigned();
            $table->integer('ubication')->after('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('post');
            $table->foreign('ubication')->references('id')->on('ubication');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('thing', function (Blueprint $table) {
            //
        });
    }
}
