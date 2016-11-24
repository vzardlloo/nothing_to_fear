<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProvinceRegion extends Model
{
    protected $table = 'province_region';
    protected $fillable = ['province_name'];
}
