<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\InnerUser;
use App\Farmer;
use App\UavInfo;
use App\WeatherList;
use App\ProvinceRegion;
use App\CityRegion;
use App\AreaRegion;
use App\TownRegion;
use App\CountryRegion;

class TaskController extends Controller
{

	 /**
     * 响应植保任务
     * @author 胡军
     * @date   2016年11月19日09:31:49
     * @return [type]                   [description]
     */
    public function index()
    {
    	$users = InnerUser::all();
    	$farmers = Farmer::all();
    	$uaves = UavInfo::all();
    	$weather = WeatherList::all();
    	$provinces = ProvinceRegion::all();
    	$cities = CityRegion::all();
    	$areaes = AreaRegion::all();
    	$towns = TownRegion::all();
    	$countries = CountryRegion::all();

    	return view('task.index',compact('users','farmers','uaves','weather','provinces','cities','areaes','towns','countries'));
    }

	 /**
     * 植保任务创建
     * @author 胡军
     * @date   2016年11月19日09:31:49
     * @return [type]                   [description]
     */
    public function create(Request $request)
    {

    	$task_name = $request->get('task_name');
    	return $task_name;
    }

    
}
