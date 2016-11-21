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
		$provinces = ProvinceRegion::all();
    	$cities = CityRegion::all();
    	$areaes = AreaRegion::all();
    	$towns = TownRegion::all();
    	$countries = CountryRegion::all();
		return view('add.address',compact('provinces','cities','areaes','towns','countries'));
	}
	public function create(Request $request)
	{
        $address_info = $request->all();
        $province = array();
        $province = array_add($province,'province_name',$address_info['province']);
        $city = array();
        $city = array_add($city,'city_name',$address_info['city']);
        $city = array_add($city, 'province_id',1);
        $area = array();
        $area = array_add($area,'area_name',$address_info['area']);
        $area = array_add($area,'city_id',1);
        $town = array('town_name'=>$address_info['town'],'area_id'=>1);
        $country = array('country_name'=>$address_info['country'],'town_id'=>1);

        ProvinceRegion::create($province);
        CityRegion::create($city);
        AreaRegion::create($area);
        TownRegion::create($town);
        CountryRegion::create($country);
		return back();
	}
}
