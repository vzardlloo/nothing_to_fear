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
use App\TaskInfo;

class TaskController extends Controller
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
    	$countries =  CountryRegion::all();
        $task_info = TaskInfo::all();
        //编写联合查询语句--得到合集的数组处理
    	return view('task.index',compact('task_info','users','farmers','uaves','weather','provinces','cities','areaes','towns','countries'));
    }

	 /**
     * 植保任务创建
     * @author 胡军
     * @date   2016年11月19日09:31:49
     * @modifed 2016年11月21日08:53:55
     * @return [type]                   [description]
     */
    public function create(Request $request)
    {

    	$task_info = $request->all();
        $task_team_id = '';
        $task_uav_id = '';
        $task_place_id = '';
        //使用starts_with判断字段
        foreach ($task_info as $task => $info) {
            if(starts_with($task,'task_team_id')){
                $task_team_id.=$info.',';        //使用点号表示合并,使用加号表示数值加
            }
            if(starts_with($task,'task_uav_id')){
                $task_uav_id.=$info.',';
            }
            if(starts_with($task,'place_')){
                $task_place_id.=$info.',';
            }
        }

        $task_info = array_add($task_info,'task_team_id',$task_team_id);
        $task_info = array_add($task_info,'task_uav_id',$task_uav_id);
        $task_info = array_add($task_info,'task_place_id',$task_place_id);
        TaskInfo::create($task_info);
    	return back();
    }

    
}
