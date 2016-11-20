<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Farmer;
use App\ProvinceRegion;
use App\CityRegion;
use App\AreaRegion;
use App\TownRegion;
use App\CountryRegion;

class FarmerController extends Controller
{
    //
    public function index()
    {
    	$farmers = Farmer::paginate(8);
    	$provinces = ProvinceRegion::all();
    	$cities = CityRegion::all();
    	$areaes = AreaRegion::all();
    	$towns = TownRegion::all();
    	$countries = CountryRegion::all();
    	return view('add.farmer',compact('farmers','provinces','cities','areaes','towns','countries'));
    }

    public function create()
    {
    	return back();
    }
}
