<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToUserAchievementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_achievement', function (Blueprint $table) {
            $table->integer('user_id')->after('id')->unsigned();
            $table->integer('achievement_id')->after('user_id')->unsigned();
$table->foreign('user_id')->references('id')->on('users');
$table->foreign('achievement_id')->references('id')->on('achievement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_achievement', function (Blueprint $table) {
            //
        });
    }
}
