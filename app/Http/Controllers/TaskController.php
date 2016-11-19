<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    	return view('task.index');
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
