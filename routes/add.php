<?php

/**
* 农户添加
* @author 胡军
* @date   2016年11月19日23:37:55
* @return [type]                   [description]
*/	
Route::get('farmer','FarmerController@index');

Route::post('farmer','FarmerController@create');

/**
* 添加地址
* @author 胡军
* @date   2016年11月20日10:15:29
* @return [type]                   [description]
*/
Route::get('address','AddressController@index');

Route::post('address','AddressController@create');

/**
* 添加无人机
* @author 胡军
* @date   2016年11月20日10:27:01
* @return [type]                   [description]
*/
Route::get('uav','UavController@index');

Route::post('uav','UavController@create');

/**
 * 添加用户
 * @author 胡军
 * @date   2016年11月19日09:30:40
 * @return [type]                   [description]
 */
Route::get('/user','UserController@index');

Route::post('/user','UserController@create');


/**
 * 对植保任务评价
 * @author 胡军 <hujun123qwe@163.com>
 * @date 	2016年11月22日21:26:04
 * @return webpage see in resources/add/..
 */
Route::get('mark','MarkController@index');

Route::post('mark','MarkController@create');

/**
 * 编组,建组
 * @author 胡军 <hujun123qwe@163.com>
 * @time(2016年12月16日10:15:44)
 */
Route::get('team','TeamController@index');

Route::post('team','TeamController@create');
