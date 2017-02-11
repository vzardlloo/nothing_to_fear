<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Common;
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
        if($request->isMethod('post')){

        }
    	$task_id = $request->get('id');
    	return view('task.mark',compact('task_id'));
    }

    public function create(Request $request)
    {		
    	// $mark_info = array_except($request->all(),['_token']);
    	$mark_info = $request->all();
    	// dd($mark_info);
    	Common::create($mark_info);
    	return back();
    }
}
