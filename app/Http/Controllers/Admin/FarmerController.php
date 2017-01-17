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

class FarmerController extends Controller
{
    protected $fields = [
        'farmer_name'      => '',
        'farmer_phone'     => '',
        'farmer_place'     => '',
        'farmer_area'      => '',
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
            $data['recordsTotal'] = Farmer::count();
            if(strlen($search['value'])>0){
                $data['recordsFiltered'] = Farmer::where(function($query) use ($search) {
                    $query->where('task_work_date', 'LIKE', '%'.$search['value'].'%')->orWhere('task_area', 'like', '%' . $search['value'] . '%');
                })->count();
                $data['data'] = Farmer::where(function ($query) use ($search) {
                    $query->where('task_work_date', 'LIKE', '%' . $search['value'] . '%')
                        ->orWhere('task_area', 'like', '%' . $search['value'] . '%');
                })
                    ->skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            }else{
                $data['recordsFiltered'] = Farmer::count();
                $data['data'] = Farmer::skip($start)->take($length)->orderBy($columns[$order[0]['column']]['data'],$order[0]['dir'])->get();
            }
            return response()->json($data);
        }
    	return view('admin.farmer.index');
    }

    public function create(Request $request)
    {
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
        $data['rolesAll'] = Farmer::all()->toArray();
        return view('admin.farmer.create', $data);
    }

    public function store(Request $request)
    {
        $farmer = new Farmer();
        foreach (array_keys($this->fields) as $field) {
            $farmer->$field = $request->get($field);   //如果写成$uav->field,提示无此变量
        }
        $farmer->save();
        return redirect('admin/farmer')->withSuccess('添加成功！');
    }

    public function edit($id)
    {
        $farmer = Farmer::find((int)$id);
        if (!$farmer) return redirect('/admin/farmer')->withErrors("找不到该员工!");
        $data = ['id' => (int)$id];
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $farmer->$field);
        }
        //dd($data);
        return view('admin.farmer.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $farmer = farmer::find((int)$id);
        foreach (array_keys($this->fields) as $field) {
            $farmer->$field = $request->get($field);
        }
        $farmer->save();
        return redirect('/admin/farmer')->withSuccess('修改成功！');
    }
}
