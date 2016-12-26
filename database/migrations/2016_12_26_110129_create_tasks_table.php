<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->date('task_work_date');
            $table->tinyInteger('task_farmer_id');
            $table->tinyInteger('task_staff_id');
            $table->string('task_crop_type');
            $table->float('task_area');
            $table->tinyInteger('task_is_sign');
            $table->tinyInteger('task_is_work');
            $table->tinyInteger('task_is_common');
            
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
        Schema::dropIfExists('tasks');
    }
}
