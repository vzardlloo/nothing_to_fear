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
use Carbon\Carbon;
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

        /**
         * 编写联合查询语句--得到合集的数组处理
         * @auth 胡军
         * @time 2016年11月22日21:00:59
         * @var 
                [{"task_work_time":"2016-11-16 00:00:00","task_status":0,"task_area":12,"farmer_name":"\u5510\u4ee5\u590f"},
                {"task_work_time":"2016-11-19 00:00:00","task_status":0,"task_area":12,"farmer_name":"\u90b0\u55e3\u7530"}]
         */
        $task_info = \DB::table('task_info')
            ->join('farmer','task_info.task_farmer_id', '=','farmer.farmer_id')
            ->select('task_info.task_work_time', 'task_id','task_info.task_status','task_info.task_area','farmer.farmer_name')
            ->get();


    	return view('task.index',compact('task_info','users','farmers','uaves','weather','provinces','cities','areaes','towns','countries'));
        // return $task_info;
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
        $task_name = '';
        $task_status = 0;
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
        $task_name = Carbon::now()->toDateTimeString();
        
        $task_info = array_add($task_info,'task_team_id',$task_team_id);
        $task_info = array_add($task_info,'task_uav_id',$task_uav_id);
        $task_info = array_add($task_info,'task_place_id',$task_place_id);
        $task_info = array_add($task_info,'task_name',$task_name);
        $task_info = array_add($task_info,'task_status',$task_status);
        TaskInfo::create($task_info);
    	return back();
    }

    public function item(Request $request)
    {
        $task_id = $request->get('task_id');

        //得到所有信息
        $task_info = \DB::table('task_info')
            ->join('farmer','task_info.task_farmer_id', '=','farmer.farmer_id')
            ->select('task_info.task_work_time','task_info.task_status','task_info.task_area','farmer.farmer_name','farmer.farmer_address','farmer.phone_num','task_info.task_place_id')
            ->where('task_id','=',$task_id)
            ->get();
        $task = $task_info[0];

        echo json_encode($task);
    }
    
    public function cancel(Request $request)
    {
        $task_id = $request->get('task_id');
        return $task_id;
    }

    /**
     * 推迟任务
     * @param  Request $request 请求链接http://lara.vel/task-delay?task_id=2&task_delay_time=12-12-1
     * @return 1           成功
     *         2           失败
     * @date(2016-12-13 13:19:02)
     * 总结：一个简单的功能，从前端的推迟按钮到选择时间到后台请求到页面提示结果
     *        只是要求了一下，不刷新页面就搞成这样
     * 下一步：从新学习一下jQuery
     */ 
    public function delay(Request $request)
    {
        $task_id = $request->get('task_id');
        $task_delay_time = $request->get('task_delay_time');

        $date = explode("-", $task_delay_time);
        $date_form = Carbon::createFromDate($date[0],$date[1],$date[2]);

        if(TaskInfo::where('task_id',$task_id)
            ->update(['task_work_time' => $date_form])){
            echo json_encode(1);
        }else{
            echo json_encode(2);
        }
    }
}
