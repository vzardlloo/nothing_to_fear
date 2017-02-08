<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Farmer;
use App\Task;
use App\Staff;
use App\Drone;
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
     * modefied 通过session判断用户然后根据ID直接调资源
     * @return [type]                   [description]
     */
    public function task()
    {
        //得到登录者名字
        $user_name = \Auth::user()->name;
        //得到组长信息
        $staff = Staff::get()->where('staff_name','=',$user_name);
        //得到所在组信息
        $team = Staff::get()->where('staff_row','=',$staff[0]['staff_row']);
        //得到任务信息
        //$task = Task::get()->where('task_staff_id','=',$staff[0]['staff_row']);
        //得到农户信息
        //$farmer = Farmer::get()->where('id','=',$task[0]['task_farmer_id']);
        $task = Task::where('task_staff_id','=',$staff[0]['staff_row'])->join('farmers','farmers.id', '=', 'tasks.task_farmer_id')->select('farmers.farmer_name','tasks.task_farmer_id','tasks.task_work_date','tasks.id','tasks.task_area')->get();
        //var_dump($farmer[0]);
        //$task = $task[0];
//var_dump($task);
    	return view('task.task',compact('team','task'));
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
        $task_id = $request->get('id');

        //得到所有信息
        $task_info = \DB::table('task')
            ->join('farmers','tasks.task_farmer_id', '=','farmers.id')
            ->select('task_info.task_work_time','task_info.task_status','task_info.task_area','farmer.farmer_name','farmer.farmer_address','farmer.phone_num','task_info.task_place_id')
            ->where('task_id','=',$task_id)
            ->get();
        $task = $task_info[0];

        echo json_encode($task);
    }
    
    public function cancel(Request $request)
    {
        $task_id = $request->get('id');
        return view('task.cancel',compact('task_id'));
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
        if($request->isMethod('post')){
            $task_id = $request->get('id');
            $task_delay_time = $request->get('task_delay_date');

            $date = explode("-", $task_delay_time);
            $date_form = Carbon::createFromDate($date[0],$date[1],$date[2]);

            if(Task::where('id',$task_id)
                ->update(['task_work_date' => $date_form])){
                echo json_encode(1);
            }else{
                echo json_encode(2);
            }
        }
        $task_id = $request->get('id');
        return view('task.delay',compact('task_id'));
    }

    public function complete(Request $request)
    {
        $task_id = $request->get('id');
        if(Task::where('id',$task_id)->update(['task_is_work'=>1])){
            echo json_encode(1);
        }else{
            echo json_encode(2);
        }
    }
}
