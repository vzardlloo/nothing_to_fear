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
    
    /**
     * 登录认证
     * @author 胡军
     * @date   2016年11月21日10:58:32
     * @return [type]                   [description]
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

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

    public function create(Request $request)
    {
        $farmer_info = $request->all();
        $farmer_address = '';
        foreach ($farmer_info as $farmer => $info) {
            if(starts_with($farmer,'place_')){
                $farmer_address.=$info.',';
            }
        }
        $farmer_info = array_add($farmer_info, 'farmer_address', $farmer_address);
        Farmer::create($farmer_info);
    	return back();
    }
}
