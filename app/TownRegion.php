<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TownRegion extends Model
{
    protected $table = 'town_region';
    protected $fillable = ['town_name','area_id'];
}
