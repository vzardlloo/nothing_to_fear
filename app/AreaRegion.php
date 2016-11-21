<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaRegion extends Model
{
    protected $table = 'area_region';
    protected $fillable = ['area_name','city_id'];
}
