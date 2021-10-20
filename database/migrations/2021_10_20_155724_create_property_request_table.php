<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_request', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->tinyInteger('request_type')->default('0');
            $table->tinyInteger('request_state')->default('0');
            $table->tinyInteger('degree_interest')->default('0');
            $table->string('message');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_request');
    }
}
