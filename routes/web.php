
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@task');

Route::get('database','DatabaseController@index');

Route::get('user_log_2_inner_user','DatabaseController@log');

Route::get('login', 'DatabaseController@login');

Route::post('logins', array('before'=>'csrf',function(){
	$rules = array(
		'user_name' => 'required',
		'password'  => 'required'
	);

	$messages = array(
		'required'	=> 'The :attribute is really really important.',
		'same'		=> 'The :others must match.'
	);

	$validator = Validator::make(Request::all(), $rules, $messages);

	if($validator->fails()){
		$messages = $validator->messages();

		return Redirect::to('login')->withErrors($validator)->withInput(Request::except('password'));
	}else{
		
		$user_name = Request::get('user_name');
		$password = Request::get('password');

		//为什么使用get方法无法判断非空？
		if(empty(DB::table('inner_users')->where([['user_name','=',$user_name],['password','=',$password]])->value('phone_num'))){
			return Redirect::to('login');
		}else{
			return view('welcome');
		}
	}
}));

/**
 * 植保任务_首页
 * @author 胡军
 * @date   2016年11月19日09:30:40
 * @return [type]                   [description]
 */
Route::get('/task','TaskController@index');

/**
 * 植保任务_创建
 * @author 胡军
 * @date   2016年11月19日09:30:40
 * @return [type]                   [description]
 */
Route::post('/task','TaskController@create');


Route::get('/user','UserController@index');
Route::post('/user','UserController@create');
Auth::routes();

Route::get('/home', 'HomeController@index');

/**
 * 作业任务信息详情
 * @author 胡军 <hujun123qwe@163.com>
 * @date   2016年12月8日10:20:58
 */
Route::get('task-item', 'TaskController@item');

/**
 * 取消任务
 * @author 胡军 <hujun123qwe@163.com>
 * @date   2016年12月8日14:03:45
 */
Route::post('task-cancel', 'TaskController@cancel');

/**
 * 推迟任务
 * @author 胡军 <hujun123qwe@163.com>
 * @date(2016年12月13日11:00:58)
 */
Route::get('task-delay', 'TaskController@delay');

/**
 * 完成任务
 * @author 胡军 <hujun123qwe@163.com>
 * @date(2016-12-14 11:07:53)
 */
Route::get('task-complete', 'TaskController@complete');
