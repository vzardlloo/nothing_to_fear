<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UavInfo;

class UavController extends Controller
{
	/**
	* 添加无人机首页
	* @author 胡军
	* @date   2016年11月20日10:15:29
	* @return [type]                   [description]
	*/
    public function index()
    {
    	$uavs = UavInfo::all();
    	return view('add.uav',compact('uavs'));
    }

    /**
	* 添加无人机处理页
	* @author 胡军
	* @date   2016年11月20日10:15:29
	* @return [type]                   [description]
	*/
    public function create(Request $request)
    {
    	$info = $request->all();
    	UavInfo::create($info);
    	return back();
    }
}
