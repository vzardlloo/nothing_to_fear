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

class UavController extends Controller
{
    //要填写哪些数据就写在这
    protected $fields = [
        'drone_row' => '' ,
        'drone_buy_date' => '' ,
        'drone_last_work' => '' ,
        'drone_rote_date' => '' ,
        'drone_check_date' => '' ,
        'drone_repair_date' => '' ,
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
            $data['recordsTotal'] = Drone::count();
            if(strlen($search['value'])>0){
                $data['recordsFiltered'] = Drone::where(function($query) use ($search) {
                    $query->where('task_work_date', 'LIKE', '%'.$search['value'].'%')->orWhere('task_area', 'like', '%' . $search['value'] . '%');
                })->count();
                $data['data'] = Drone::where(function ($query) use ($search) {
                    $query->where('task_work_date', 'LIKE', '%' . $search['value'] . '%')
                        ->orWhere('task_area', 'like', '%' . $search['value'] . '%');
                })
                    ->skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            }else{
                $data['recordsFiltered'] = Drone::count();
                $data['data'] = Drone::skip($start)->take($length)->orderBy($columns[$order[0]['column']]['data'],$order[0]['dir'])->get();
            }
            return response()->json($data);
        }
    	return view('admin.uav.index');
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
        $data['rolesAll'] = Drone::all()->toArray();
        return view('admin.uav.create', $data);
    }

    public function store(Request $request)
    {
        $uav = new Drone();
        foreach (array_keys($this->fields) as $field) {
            $uav->$field = $request->get($field);   //如果写成$uav->field,提示无此变量
        }
        $uav->save();
        return redirect('admin/uav')->withSuccess('添加成功！');
    }

    public function edit($id)
    {
        $uav = Drone::find((int)$id);
        if (!$uav) return redirect('/admin/uav')->withErrors("找不到该植保无人机!");
        $data = ['id' => (int)$id];
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $uav->$field);
        }
        //dd($data);
        return view('admin.uav.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $uav = Drone::find((int)$id);
        foreach (array_keys($this->fields) as $field) {
            $uav->$field = $request->get($field);
        }
        $uav->save();
        return redirect('/admin/uav')->withSuccess('修改成功！');
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

        if(Drone::where('id',$task_id)
            ->update(['task_work_date' => $date_form])){
            echo json_encode(1);
        }else{
            echo json_encode(2);
        }
    }

    public function complete(Request $request)
    {
        $task_id = $request->get('id');
        if(Drone::where('id',$task_id)->update(['task_is_work'=>1])){
            echo json_encode(1);
        }else{
            echo json_encode(2);
        }
    }
}
