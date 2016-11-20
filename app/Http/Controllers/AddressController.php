<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProvinceRegion;
use App\CityRegion;
use App\AreaRegion;
use App\TownRegion;
use App\CountryRegion;
class AddressController extends Controller
{
	public function index()
	{
		$provinces = ProvinceRegion::all();
    	$cities = CityRegion::all();
    	$areaes = AreaRegion::all();
    	$towns = TownRegion::all();
    	$countries = CountryRegion::all();
		return view('add.address',compact('provinces','cities','areaes','towns','countries'));
	}
	public function create()
	{
		return back();
	}
}
