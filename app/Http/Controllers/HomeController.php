<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InnerUser;
use App\Farmer;
use App\UavInfo;
use App\WeatherList;
use App\ProvinceRegion;
use App\CityRegion;
use App\AreaRegion;
use App\TownRegion;
use App\CountryRegion;
use App\TaskInfo;
use Carbon\Carbon;
class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * 网站首页,所有的任务
     * 先登录
     * @return  文件信息
     */
    public function task()                  
    {
        // $users = InnerUser::all();
        // $farmers = Farmer::all();
        // $uaves = UavInfo::all();
        // $weather = WeatherList::all();
        // $provinces = ProvinceRegion::all();
        // $cities = CityRegion::all();
        // $areaes = AreaRegion::all();
        // $towns = TownRegion::all();
        // $countries =  CountryRegion::all();

        /**
         * 查询未完成的信息
         * @var 得到任务的所有信息
         */
        $task_info_0 = \DB::table('task_info')
            ->join('farmer','task_info.task_farmer_id', '=','farmer.farmer_id')
            ->select('task_info.task_work_time', 'task_id','task_info.task_status','task_info.task_area','farmer.farmer_name')
            ->where('task_info.task_status','=','0')
            ->get();

        /**
         * 查询已完成的信息
         * @var [type]
         */
        // $task_info_1 = \DB::table('task_info')
        //     ->join('farmer','task_info.task_farmer_id', '=','farmer.farmer_id')
        //     ->select('task_info.task_work_time', 'task_id','task_info.task_status','task_info.task_area','farmer.farmer_name')
        //     ->where('task_info.task_status','=','1')
        //     ->get();

        /**
         * 查询推迟的任务
         * @var [type]
         */
        // $task_info_2 = \DB::table('task_info')
        //     ->join('farmer','task_info.task_farmer_id', '=','farmer.farmer_id')
        //     ->select('task_info.task_work_time', 'task_id','task_info.task_status','task_info.task_area','farmer.farmer_name')
        //     ->where('task_info.task_status','=','2')
        //     ->get();

        /**
         * 查询全部的任务
         * @var [type]
         */
        $task_info = \DB::table('task_info')
            ->join('farmer','task_info.task_farmer_id', '=','farmer.farmer_id')
            ->select('task_info.task_work_time', 'task_id','task_info.task_status','task_info.task_area','farmer.farmer_name')
            ->get();

        // return view('task.home',compact('task_info_0','task_info_3','task_info','users','farmers','uaves','weather','provinces','cities','areaes','towns','countries'));
        return view('task.home',compact('task_info_0','task_info'));
    }
}
