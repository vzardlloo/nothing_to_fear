<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    
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
}
