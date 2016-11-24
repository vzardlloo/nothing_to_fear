<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UavInfo extends Model
{
    protected $table = 'uav_info';
    protected $fillable = ['uav_name','uav_type','uav_buy_time'];
}
