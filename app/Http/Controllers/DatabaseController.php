<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;		//没有找到DB就直接加上
use App\UserLog;
use App\InnerUser;		//注意p是小写
use DateTime;
use Carbon\Carbon;		//获取时间，https://scotch.io/tutorials/easier-datetime-in-laravel-and-php-with-carbon
class DatabaseController extends Controller
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
    public function index(){

    	$user_log = new UserLog();
    	$user_log_info = $user_log->get();

    	//$user_log = DB::table('user_logs')->get();
    	$inner_user = DB::table('inner_users')->get();

    	return view('database.index',compact('user_log_info','inner_user'));
    }

    public function log(Request $request){
    	//turn Carbon::now();
    	$user_id = $request->input('user_id');
    	$user_log = new UserLog();
    	$inner_user = new InnerUser();
    	$inner_user = $inner_user->get()->first();		//得到的还是一个数组

    	//return $inner_user->inner_user_id;

		$user_log->inner_user_id = $inner_user->inner_user_id;
		$user_log->log_time = new DateTime();
		$user_log->log_info = 'Contect User_log and Inner_user';
		$user_log->ip_address = $request->ip();			//得到客户端ip地址 http://stackoverflow.com/questions/33268683/how-to-get-client-ip-address-in-laravel-5-1

		$inner_user->addLog($user_log);
    	return $user_log;
    }

    public function login(){
        return view('database.login');
    }

    public function login_in(Request $request){

        $user_name = $request->get('user_name');
        $password = $request->get('password');

        return $user_name;
    }

}
