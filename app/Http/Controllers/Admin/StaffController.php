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

class StaffController extends Controller
{
    protected  $fields = [
        'staff_name' => '',
        'staff_phone'=> '',
        'staff_role' => '',
        'staff_row'  => '',
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
            $data['recordsTotal'] = Staff::count();
            if(strlen($search['value'])>0){
                $data['recordsFiltered'] = Staff::where(function($query) use ($search) {
                    $query->where('task_work_date', 'LIKE', '%'.$search['value'].'%')->orWhere('task_area', 'like', '%' . $search['value'] . '%');
                })->count();
                $data['data'] = Staff::where(function ($query) use ($search) {
                    $query->where('task_work_date', 'LIKE', '%' . $search['value'] . '%')
                        ->orWhere('task_area', 'like', '%' . $search['value'] . '%');
                })
                    ->skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            }else{
                $data['recordsFiltered'] = Staff::count();
                $data['data'] = Staff::skip($start)->take($length)->orderBy($columns[$order[0]['column']]['data'],$order[0]['dir'])->get();
            }
            return response()->json($data);
        }
    	return view('admin.staff.index');
    }

    public function create(Request $request)
    {
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
        $data['rolesAll'] = Staff::all()->toArray();
        return view('admin.staff.create', $data);
    }

    public function store(Request $request)
    {
        $staff = new Staff();
        foreach (array_keys($this->fields) as $field) {
            $staff->$field = $request->get($field);   //如果写成$uav->field,提示无此变量
        }
        $staff->save();
        return redirect('admin/staff')->withSuccess('添加成功！');
    }

    public function edit($id)
    {
        $staff = Staff::find((int)$id);
        if (!$staff) return redirect('/admin/staff')->withErrors("找不到该员工!");
        $data = ['id' => (int)$id];
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $staff->$field);
        }
        //dd($data);
        return view('admin.staff.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $staff = Staff::find((int)$id);
        foreach (array_keys($this->fields) as $field) {
            $staff->$field = $request->get($field);
        }
        $staff->save();
        return redirect('/admin/staff')->withSuccess('修改成功！');
    }
}
