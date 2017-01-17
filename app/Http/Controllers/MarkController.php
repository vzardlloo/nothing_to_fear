<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskMark;
use App\TaskInfo;
use App\ProvinceRegion;
use App\CityRegion;
use App\AreaRegion;
use App\TownRegion;
use App\CountryRegion;
use App\InnerUser;
use App\WeatherList;
class MarkController extends Controller
{
	/**
	 * 添加显示地址详细信息
	 * @author 胡军 <hujun123qwe@163.com>
	 * @time(2016年11月23日10:31:25)
	 * @param  Request $request 得到任务ID
	 * @return 参数           [description]
	 */
    public function index(Request $request)
    {
    	$mark_info = TaskMark::all();
    	$task_id = $request->get('task_id');
    	$task_info = TaskInfo::where('task_id','=',$task_id)->get();

    	$place = explode(',',$task_info[0]->task_place_id);
    	//dd($task_place);
    	$provinces = ProvinceRegion::where('province_id','=',$place[0])->get();   //显示结果集
    	$cities = CityRegion::where('city_id','=',$place[1])->get();
    	$areaes = AreaRegion::where('area_id','=',$place[2])->get();
    	$towns = TownRegion::where('town_id','=',$place[3])->get();
    	$countries =  CountryRegion::where('country_id','=',$place[4])->get();

    	//得到工作人员名
    	$user_id = explode(',',$task_info[0]->task_team_id);
    	$user_info = InnerUser::whereIn('inner_user_id',$user_id)->select('user_name')->get();
    	// dd($user_info);
    	
    	$weather_info = WeatherList::all();
    	return view('add.mark',compact('mark_info','weather_info','user_info','task_info','provinces','cities','areaes','towns','countries'));
    }

    public function create(Request $request)
    {		
    	// $mark_info = array_except($request->all(),['_token']);
    	$mark_info = $request->all();
    	// dd($mark_info);
    	TaskMark::create($mark_info);
    	return back();
    }
}
