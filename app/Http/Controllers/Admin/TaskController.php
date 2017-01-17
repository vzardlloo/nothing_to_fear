<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Farmer;
use App\Task;
use App\Staff;
use App\Drone;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{

    protected $fields = [
        'task_work_date' => '' ,
        'task_farmer_id' => '' ,
        'task_staff_id' => '' ,
        'task_crop_type' => '' ,
        'task_area' => '' ,
        'task_is_sign' => '' ,
        'task_is_work' => '' ,
        'task_is_common' => '' ,
    ];
    /**
     * 登录认证
     * @author 胡军
     * @date   2016年11月21日10:58:32
     * @return [type]                   [description]
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

	 /**
     * 响应植保任务
     * @author 胡军
     * @date   2016年11月19日09:31:49
     * modefied 通过session判断用户然后根据ID直接调资源
     * @return [type]                   [description]
     */
    public function index1(Request $request)
    {
        $comData = $request->get('comData_menu');
        var_dump($comData);

    }
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = array();
            $data['draw'] = $request->get('draw');
            $start = $request->get('start');
            $length = $request->get('length');
            $order = $request->get('order');
            $columns = $request->get('columns');
            $search = $request->get('search');
            $data['recordsTotal'] = Task::count();
            if(strlen($search['value'])>0){
                $data['recordsFiltered'] = Task::where(function($query) use ($search) {
                    $query->where('task_work_date', 'LIKE', '%'.$search['value'].'%')->orWhere('task_area', 'like', '%' . $search['value'] . '%');
                })->count();
                $data['data'] = Task::where(function ($query) use ($search) {
                    $query->where('task_work_date', 'LIKE', '%' . $search['value'] . '%')
                        ->orWhere('task_area', 'like', '%' . $search['value'] . '%');
                })
                    ->skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            }else{
                $data['recordsFiltered'] = Task::count();
                $data['data'] = Task::skip($start)->take($length)->orderBy($columns[$order[0]['column']]['data'],$order[0]['dir'])->join('farmers','farmers.id', '=', 'tasks.task_farmer_id')->get();
            }
            return response()->json($data);
        }
    	return view('admin.task.index');
    }

    public function edit($id)          
    {
        $task = Task::find((int)$id);
        if (!$task) return redirect('/admin/task')->withErrors("找不到该任务!");
        $data = ['id' => (int)$id];
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $task->$field);
        }
        //dd($data);
        return view('admin.task.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $task = Task::find((int)$id);
        foreach (array_keys($this->fields) as $field) {
            $task->$field = $request->get($field);
        }
        $task->save();
        return redirect('/admin/task')->withSuccess('添加成功！');
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
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
        $data['rolesAll'] = Task::all()->toArray();
        return view('admin.task.create', $data);
    }

    public function store(Request $request)
    {   
        $task = new Task();
        foreach (array_keys($this->fields) as $field) {
            $task->$field = $request->get($field);
        }
        $task->save();
        // event(new \App\Events\userActionEvent('\App\AdminUser',$user->id,1,'添加了用户'.$user->name));
        return redirect('/admin/task')->withSuccess('添加成功！');
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
