<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CityRegion extends Model
{
    protected $table = 'city_region';
    protected $fillable = ['city_name','province_id'];
}
