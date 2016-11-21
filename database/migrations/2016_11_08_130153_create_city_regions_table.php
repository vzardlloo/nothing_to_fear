<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_regions', function (Blueprint $table) {
            $table->increments('city_id');
            $table->tinyInteger('province_id');
            $table->string('city_name');
            $table->timestamps();

            $table->unique('city_name');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_regions');
    }
}
