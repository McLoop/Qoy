<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestResponseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_response', function (Blueprint $table) {
            $table->increments('id');
            $table->string('message');
            $table->timestamps();
            $table->tinyInteger('request_response_type')->default('0');
            $table->tinyInteger('request_response_state')->default('0');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_response');
    }
}
