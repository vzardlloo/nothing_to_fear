<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UavInfo;

class UavController extends Controller
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
