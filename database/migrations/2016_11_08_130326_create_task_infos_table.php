<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_infos', function (Blueprint $table) {
            $table->increments('task_id');
            $table->string('task_team_id',10);
            $table->tinyInteger('task_farmer_id');      
            $table->string('task_place_id',10);
            $table->string('task_during',20);
            $table->tinyInteger('task_uav_id');     //无人机型号
            $table->text('task_chamical');       //填写详细的农药使用（包括农药名称，农药用量）
            $table->float('task_area');
            $table->string('task_weather',10);      //格式：1，2  前表示天气后表示风力
            $table->tinyInteger('task_mark');       //对本次作业评级,1=A+;2=A;3=B;4=C;5=D;6=E;7=F;
            $table->text('task_common');         //对作业评价
            $table->tinyInteger('task_spray_mark'); //对田地是否好喷洒评价，会同步到农田信息里
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
        Schema::dropIfExists('task_infos');
    }
}
