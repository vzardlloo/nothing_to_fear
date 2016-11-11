<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInnerUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inner_users', function (Blueprint $table) {
            //define column name and data struct type
            $table->increments('inner_user_id');
            $table->string('user_name', 60);
            $table->string('password',60);  //becouse hash code length is 60 chars
            $table->string('phone_num',11);
            $table->tinyInteger('role',false,true);
            $table->tinyInteger('level',false,true);
            $table->timestamps();

            //make sure which is unique or foreige
            $table->unique('user_name');
            $table->unique('phone_num');
            //$table->primary('inner_user_id'); //error, increments() is enough
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inner_users');
    }
}
