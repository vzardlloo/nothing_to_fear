<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUavInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uav_infos', function (Blueprint $table) {
            $table->increments('uav_id');
            $table->string('uav_name',255);
            $table->string('uav_type',255);
            $table->dateTime('uav_buy_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uav_infos');
    }
}
