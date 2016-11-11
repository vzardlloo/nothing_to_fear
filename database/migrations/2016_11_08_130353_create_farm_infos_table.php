<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farm_infos', function (Blueprint $table) {
            $table->increments('farm_id');
            $table->string('farm_location',10);     //农田具体信息
            $table->tinyInteger('farmer_id');       //农田所有者
            $table->tinyInteger('crops_id');        //农作物
            $table->tinyInteger('farm_mark');       //农田喷洒难易度评分
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
        Schema::dropIfExists('farm_infos');
    }
}
