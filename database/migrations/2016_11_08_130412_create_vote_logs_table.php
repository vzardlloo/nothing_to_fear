<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoteLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_logs', function (Blueprint $table) {
            $table->increments('vote_id');
            $table->tinyInteger('task_id');
            $table->tinyInteger('inner_user_id');
            $table->tinyInteger('vote_star');
            $table->text('vote_content');
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
        Schema::dropIfExists('vote_logs');
    }
}
