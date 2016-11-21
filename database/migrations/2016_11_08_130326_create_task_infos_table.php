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
            $table->string('task_farmer_id',10);      
            $table->string('task_place_id',10);
            $table->string('task_uav_id',10);     //无人机型号
            $table->float('task_area');
            $table->dateTime('task_work_time');
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
