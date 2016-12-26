<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDronesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drones', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('drone_row');
            $table->date('drone_buy_date');
            $table->date('drone_last_work');
            $table->date('drone_rote_date');
            $table->date('drone_check_date');
            $table->date('drone_repair_date');

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
        Schema::dropIfExists('drones');
    }
}
